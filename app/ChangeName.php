<?php

namespace App;

use GuzzleHttp\TransferStats;
use Yangqi\Htmldom\Htmldom;

class ChangeName
{
    private $uid;
    private $cookies;
    private $fb_dtsg;
    private $jazoest;
    private $client;

    public $raw;

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

        $this->raw = $raw;

        return $this;
    }

    public function changeName(){
        $url = "https://mbasic.facebook.com/a/settings/account/?confirm_new_name=1&confirm_name";
        $r = $this->client->post($url, [
            'headers' => $this->headers,
            'form_params'  => [
                'fb_dtsg' => $this->fb_dtsg,
                'jazoest' => $this->jazoest,
                'display_format' => 'complete',
	            'save_password' => $this->uid->pw,
                'primary_last_name' => 'Lý',
	            'primary_middle_name' => 'Hoàng',
	            'primary_first_name' => 'Nam',
            ]
        ]);

        $raw = $r->getBody()->getContents();

        $this->raw = $raw;

        return $this;
    }

    public function nameForm(){
        $url = "https://mbasic.facebook.com/settings/account/?name";

        $r = $this->client->get($url, [
            'headers' => $this->headers,
            'cookies' => $this->cookies
        ]);

        echo $r->getBody()->getContents();

    }
}