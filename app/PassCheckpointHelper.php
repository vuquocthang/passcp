<?php

namespace App;


use Illuminate\Support\Facades\Log;

class PassCheckpointHelper
{
    /**
     * @param $uid : uid của clone. ex: 1000214142748
     * @param $listName : mảng tên . ex: [ '0' => 'Vương', '1' => 'Phú' ]
     * @param $imageLink : link ảnh . ex: http://fb.com/e.jpg
     */
    public static function checkImage($uid, $listName, $imageLink){
        try{
            //gửi sang flask
            $url = config('app.api_url') . "/process2";

            $client = new \GuzzleHttp\Client();

            $r = $client->post($url, [
                'form_params'  => [
                    'uid' => $uid,
                    'listName' => json_encode($listName),
                    'imageLink' => $imageLink
                ]
            ]);


            $result = $r->getBody()->getContents();

            foreach ($listName as $index => $name){
                if ($result == $name){
                    return $index;
                }
            }

            return -1;
        }catch (\Exception $e){
            Log::info($e);

            echo $e;
            return -1;
        }
    }

}