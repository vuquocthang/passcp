<?php

namespace App;

use GuzzleHttp\TransferStats;
use Yangqi\Htmldom\Htmldom;

class PassCheckpoint
{
    //uid object backup
    private $uid;

    //data to request
    private $cookieJar;
    private $client;
    private $fb_dtsg;
    private $jazoest;
    private $nh;
    private $verification_method = 2;
    private $choice_names;
    private $image_link;

    private $birthday_day = 1;
    private $birthday_month = 11;
    private $birthday_year = 1999;

    public $raw;

    private $headers = [
        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36',
        'Accept'     => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
    ];

    public function __construct($uid)
    {
        $this->client = new \GuzzleHttp\Client(['cookies' => true]);
        $this->uid = $uid;
    }


    public function login(){
        $url = "https://mbasic.facebook.com/login/device-based/regular/login/?refsrc=https%3A%2F%2Fmbasic.facebook.com%2F&lwv=100&refid=8";

        $r = $this->client->post($url, [
            'headers' => $this->headers,
            'form_params'  => [
                'email' => $this->uid->uid,
                'pass'  => $this->uid->pw
            ],
            'on_stats'  => function (TransferStats $stats) use (&$redirectUrl) {
                $redirectUrl = $stats->getEffectiveUri();
            }
        ]);

        $raw = $r->getBody()->getContents();

        //luu cookie
        $this->cookieJar = $this->client->getConfig('cookies');

        //lay fb_dtsg và jazoest
        $html = new Htmldom($raw);

        foreach($html->find('input') as $element){
            if($element->name == 'fb_dtsg'){
                $this->fb_dtsg = $element->value;
            }

            if($element->name == 'jazoest'){
                $this->jazoest = $element->value;
            }

            if($element->name == 'nh'){
                $this->nh = $element->value;
            }
        }

        $this->raw = $raw;

        //echo $raw;

        return $this;
    }

    public function next(){
        $url = "https://mbasic.facebook.com/login/checkpoint";

        $r = $this->client->post($url, [
            'headers' => $this->headers,
            'form_params'  => [
                'fb_dtsg' => $this->fb_dtsg,
                'jazoest' => $this->jazoest,
                'checkpoint_data' => '',
                'nh' => $this->nh,
                'submit[Continue]' => 'Tiếp tục'
            ],
            'cookies' => $this->cookieJar
        ]);

        $raw = $r->getBody()->getContents();

        //lay danh sach phuong thuc xac minh
        try{
            $methods = $this->getVerificationMethods($raw);

            if(in_array(2, $methods)){
                $this->verification_method = 2;
            }elseif ( in_array(3, $methods) ){
                $this->verification_method = 3;
            }else{
                echo "Không tìm thấy loại xác minh phù hợp";
            }
        }catch (\Exception $e){
            echo "Get methods : " . $e;
        }

        //lay danh sach ten can xac minh
        try{
            $this->choice_names = $this->getListNameChoices($raw);
        }catch (\Exception $e){
            echo "Get choice names exception: " . $e;
        }

        //lấy link ảnh
        try{
            $this->image_link = $this->getImageLink($raw);
        }catch (\Exception $e){
            echo "Get image link exception: " . $e;
        }

        //luu cookie
        $this->cookieJar = $this->client->getConfig('cookies');

        //echo $raw
        $this->raw = $raw;

        return $this;
    }

    public function selectVerificationMethod(){
        $url = "https://mbasic.facebook.com/login/checkpoint";

        $r = $this->client->post($url, [
            'headers' => $this->headers,
            'form_params'  => [
                'fb_dtsg' => $this->fb_dtsg,
                'jazoest' => $this->jazoest,
                'checkpoint_data' => '',
                'verification_method' => $this->verification_method,
                'nh' => $this->nh,
                'submit[Continue]' => 'Tiếp tục'
            ],
            'cookies' => $this->cookieJar

        ]);

        //luu cookie
        $this->cookieJar = $this->client->getConfig('cookies');

        $raw = $r->getBody()->getContents();

        $this->raw = $raw;

        //echo $raw;

        //neu la xac minh ban be thi bam next
        if ($this->verification_method == 3){
            $this->next();
        }

        return $this;
    }

    public function pass($listName = [], $imageLink = null){
        $url = "https://mbasic.facebook.com/login/checkpoint";

        //nếu xác minh bằng ngày sinh
        if ($this->verification_method == 2){
            $r = $this->client->post($url, [
                'headers' => $this->headers,
                'form_params'  => [
                    'fb_dtsg' => $this->fb_dtsg,
                    'jazoest' => $this->jazoest,
                    'checkpoint_data' => '',
                    'birthday_captcha_day' => $this->uid->birthdayDay(),
                    'birthday_captcha_month' => $this->uid->birthdayMonth(),
                    'birthday_captcha_year' => $this->uid->birthdayYear(),
                    'nh' => $this->nh,
                    'submit[Continue]' => 'Tiếp tục'
                ],
                'cookies' => $this->cookieJar

            ]);

            //lưu cookie
            $this->cookieJar = $this->client->getConfig('cookies');

            $raw = $r->getBody()->getContents();

            $this->raw = $raw;
        //nếu xác minh ảnh bạn bè
        }else{
            try{
                //giá trị của ảnh cần gửi lên server
                $selectedValue = PassCheckpointHelper::checkImage($this->uid->uid, $this->choice_names, $this->image_link);

                //gửi request
                $r = $this->client->post($url, [
                    'headers' => $this->headers,
                    'form_params'  => [
                        'fb_dtsg' => $this->fb_dtsg,
                        'jazoest' => $this->jazoest,
                        'answer_choices' => $selectedValue,
                        'nh' => $this->nh,
                        'submit[Continue]' => 'Tiếp tục'
                    ],
                    'cookies' => $this->cookieJar

                ]);

                $raw = $r->getBody()->getContents();

                $this->choice_names = $this->getListNameChoices($raw);
                $this->image_link = $this->getImageLink($raw);

                //luu cookie
                $this->cookieJar = $this->client->getConfig('cookies');

                echo $raw;

            }catch (\Exception $e){

            }

        }

        return $this;
    }

    //lấy danh sách tên cần xác minh

    /**
     * @param $raw
     * @return array
     */
    public function getListNameChoices($raw){
        $html = new Htmldom($raw);

        $rs = [];

        foreach ($html->find("select[name=answer_choices] option") as $element){
            $rs[$element->value] = $element->innerText;
        }

        return $rs;
    }

    //lấy link ảnh cần xác minh
    /**
     * @param $raw
     * @return mixed
     */
    public function getImageLink($raw){
        $html = new Htmldom($raw);

        return $html->find('form img')[1]->src;
    }

    //lấy phương thức xác minh

    /**
     * @param $raw
     * @return array
     */
    public function getVerificationMethods($raw){
        $html = new Htmldom($raw);

        $rs = [];

        foreach ($html->find("option") as $element){
            $rs[] = $element->value;
        }

        return $rs;
    }

}