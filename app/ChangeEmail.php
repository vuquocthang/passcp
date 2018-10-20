<?php


namespace App;

use GuzzleHttp\TransferStats;
use Yangqi\Htmldom\Htmldom;

class ChangeEmail
{
    private $uid;
    private $cookies;
    private $fb_dtsg;
    private $jazoest;
    private $client;

    private $headers = [
        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36',
        'Accept'     => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
    ];

    public function __construct($uid)
    {
        $this->uid = $uid;
        $this->client = new \GuzzleHttp\Client(['cookies' => true]);
    }


    public function login(){
        $url = "https://mbasic.facebook.com/login/device-based/regular/login/?refsrc=https%3A%2F%2Fmbasic.facebook.com%2F&lwv=100&refid=8";

        $redirectUrl = '';

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
        $this->cookies = $this->client->getConfig('cookies');

        //lay fb_dtsg và jazoest
        $html = new Htmldom($raw);

        foreach($html->find('input') as $element){
            if($element->name == 'fb_dtsg'){
                $this->fb_dtsg = $element->value;
            }

            if($element->name == 'jazoest'){
                $this->jazoest = $element->value;
            }
        }

        //echo "<iframe>" . $raw . "</iframe>";

        //return view('test.change_name.login', compact('raw'));

        //nếu không đăng nhập được thì url sẽ chứa "login"
        //return false
        if (strpos($redirectUrl, 'login') !== false) {
            return false;
        }

        //echo $raw;

        return $this;
    }

    public function addEmail(){

    }

    public function confirmEmail(){

    }

    public function setPrimaryEmail(){

    }

    public function removeAllOldEmails(){

    }

    public function changePassword($password){
        $url = "https://mbasic.facebook.com/password/change/?redirect_uri=%2Fsettings%2Fsecurity%2F";

        $r = $this->client->post($url, [
            'headers' => $this->headers,
            'form_params'  => [
                'fb_dtsg' => $this->fb_dtsg,
                'jazoest' => $this->jazoest,
                'password_old' => $this->uid->pw,
                'password_new' => $password,
                'password_confirm' => $password
            ],
            'cookies' => $this->cookies
        ]);

        $raw = $r->getBody()->getContents();

        echo $raw;

        return $this;
    }

    public function changeLanguage($loc = 'vi_VN'){
        $url = "https://m.facebook.com/intl/ajax/save_locale/";

        $r = $this->client->post($url, [
            'headers' => $this->headers,
            'form_params'  => [
                'fb_dtsg' => $this->fb_dtsg,
                'jazoest' => $this->jazoest,
                'loc' => $loc
            ],
            'cookies' => $this->cookies
        ]);

        $raw = $r->getBody()->getContents();

        echo $raw;

        return $this;
    }

    //helper functions
    public function createEmail($domain){
        return $this->generateRandomString() . $this->generateRandomString2() . '@' . $domain;
    }

    function generateRandomString($length = 6) {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function generateRandomString2($length = 4) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getListEmails(){

    }
}