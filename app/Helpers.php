<?php


use Illuminate\Support\Facades\Storage;

class Helpers{

    static function getToken($uid, $pw){
        $params = array(
            "ancms" => time(),
            "api_key" => "3e7c78e35a76a9299309885393b02d97",
            "credentials_type" => "password",
            "email" => $uid,
            "format" => "json",
            "generate_machine_id" => "1",
            "generate_session_cookies" => "1",
            "locale" => isset($locale) ? trim($locale) : 'vi_VN',
            "method" => "auth.login",
            "password" => addslashes($pw),
            "return_ssl_resources" => "0",
            "v" => "1.0"
        );

        $sig = array();
        foreach($params as $key => $value){
            array_push($sig,"$key=$value");
        }

        $sig[]='c1e620fa708a1d5696fb991c1bde5662';
        $params['sig'] = md5(implode('',$sig));
        $url = sprintf('https://api.facebook.com/restserver.php?%s', http_build_query($params));

        $client = new \GuzzleHttp\Client();

        $res = $client->get($url);

        $data = json_decode($res->getBody()->getContents());

        var_dump($data);

        return $data->access_token;
    }

    static function getListFriends($token, $uid){
        try{
            $url = "https://graph.facebook.com/" . $uid . "/friends?access_token=" . $token . "&limit=5000&debug=all&summary=total_count";

            $client = new \GuzzleHttp\Client();

            $res = $client->get($url);

            $data = $res->getBody();

            return json_decode($data)->data;
        }catch (\Exception $e){
            //echo $e;
            return [];
        }
    }

    static function getListPhotos($token, $uid, $type = "tagged"){
        try{
            $url = "https://graph.facebook.com/v1.0/" . $uid . "/photos?limit=5000&access_token=" . $token . "&type=" . $type . "&fields=id,images";

            $client = new \GuzzleHttp\Client();

            $res = $client->get($url);

            $data = $res->getBody();

            return json_decode($data)->data;
        }catch (\Exception $e){
            //echo $e;
            return [];
        }
    }

    static function me($token){
        try{
            $url = "https://graph.facebook.com/me?access_token=" . $token ;

            $client = new \GuzzleHttp\Client();

            $res = $client->get($url);

            $data = $res->getBody();

            $data = json_decode($data);

            return $data;

        }catch (\Exception $e){
            return false;
        }
    }

    static function isCheckpoint($token){
        try{
            $url = "https://graph.facebook.com/me?access_token=" . $token ;

            $client = new \GuzzleHttp\Client();

            $res = $client->get($url);

            $data = $res->getBody();

            $data = json_decode($data);

            if(isset($data->id)){
                return false;
            };

            return true;

        }catch (\Exception $e){
            return true;
        }
    }

    static function backup($token, $uid){
        $listFriends = self::getListFriends($token, $uid);

        $clone = \App\Uid::where('uid', $uid)
            ->where('pw', '!=', null )
            ->first();

        //luu ngay sinh
        try{
            $birthday = self::me($token)->birthday;
            $clone->birthday = \Carbon\Carbon::createFromFormat("d/m/Y", $birthday)->format("Y-m-d");
            $clone->save();
        }catch (\Exception $e){

        }

        foreach ($listFriends as $friend){
            /*
            //luu danh sach ban be cua uid can backup
            try{

                //kiem tra uid da duoc luu chua
                $checkIfIsSaved = \App\Uid::where('friend_of', $clone->id)
                    ->where('uid', $friend->id)
                    ->first();

                if ($checkIfIsSaved){
                    $friendObject = $checkIfIsSaved;
                }else{
                    $friendObject = \App\Uid::create([
                        'name' => $friend->name,
                        'uid' => $friend->id,
                        'friend_of' => $clone->id
                    ]);
                }

                //$listPhotos = self::getListPhotos($token, $friend->id);
                $listPhotos = [];

                $listPhotosTagged = self::getListPhotos($token, $friend->id, "tagged");

                $listPhotos = array_merge($listPhotos, $listPhotosTagged);

                #print_r( $listPhotos );

                #echo "<br>";
                foreach ($listPhotos as $photo){
                    try{
                        \App\Photo::create([
                            'fbid' => $photo->id,
                            'uid_id' => $friendObject->id,
                            'link' => $photo->images[0]->source,
                            'width' => $photo->images[0]->width,
                            'height' => $photo->images[0]->height
                        ]);
                    }catch (\Exception $e){

                    }
                }
            }catch (\Exception $e){

            }*/

            $listPhotos = [];

            $listPhotosTagged = self::getListPhotos($token, $friend->id, "tagged");

            $listPhotos = array_merge($listPhotos, $listPhotosTagged);


            $folder = $uid;
            $fileName = $folder . '/' . $friend->id . '_' . md5($friend->name) . '.txt';


            if (Storage::disk('friends')->exists($fileName)) {
                Storage::disk('friends')->delete($fileName);
            }

            //Storage::disk('friends')->put($fileName, $friend->name);

            foreach ($listPhotos as $photo){
                Storage::disk('friends')->append($fileName, $photo->images[0]->source . '|' . $photo->images[0]->width . '|' . $photo->images[0]->height);
            }

        }

        $clone->backup_at = \Carbon\Carbon::now();
        $clone->save();

    }

    /**
     * @param $uidObject
     * @param $friendToken
     */

    //backup uid bằng token của bạn bè
    static function backupByFriend($uidObject, $friendToken){
        //lấy ảnh của friendToken
        $friendObject = self::me($friendToken);

        if ( !$friendObject){
            return "Token không hợp lệ !";
        }

        //lưu friend object
        $friendUid = \App\Uid::create([
            'uid' => $friendObject->id,
            'name' => $friendObject->name,
            'friend_of' => $uidObject->id
        ]);
        //lấy danh sách ảnh của friendToken
        try{
            $photosOfFriend = self::getListPhotos($friendToken, $friendObject->id);
        }catch (\Exception $e){
            return "Có lỗi xảy ra ! Không lấy được ảnh của token này !";
        }



        //lưu ảnh của friendToken
        foreach ($photosOfFriend as $photo){
            try{
                \App\Photo::create([
                    'fbid' => $photo->id,
                    'uid_id' => $friendUid->id,
                    'link' => $photo->images[0]->source,
                    'width' => $photo->images[0]->width,
                    'height' => $photo->images[0]->height
                ]);
            }catch (\Exception $e){
                //\Illuminate\Support\Facades\Log::
            }
        }

        //lấy danh sách bạn bè của uid cần backup
        try {
            $friendsOfUidObject = self::getListFriends($friendToken, $uidObject->uid);
        }catch (\Exception $e){
            return "Có lỗi xảy ra ! Không lấy được danh sách bạn bè !";
        }

        foreach ($friendsOfUidObject as $friend){
            //luu danh sach ban be cua uid can backup
            try{

                //kiem tra uid da duoc luu chua
                $checkIfIsSaved = \App\Uid::where('friend_of', $uidObject->id)
                    ->where('uid', $friend->id)
                    ->first();

                if ($checkIfIsSaved){
                    $friendObject = $checkIfIsSaved;
                }else{
                    $friendObject = \App\Uid::create([
                        'name' => $friend->name,
                        'uid' => $friend->id,
                        'friend_of' => $uidObject->id
                    ]);
                }

                //$listPhotos = self::getListPhotos($token, $friend->id);
                $listPhotos = [];

                $listPhotosTagged = self::getListPhotos($friendToken, $friend->id, "tagged");

                $listPhotos = array_merge($listPhotos, $listPhotosTagged);

                #print_r( $listPhotos );

                #echo "<br>";
                foreach ($listPhotos as $photo){
                    try{
                        \App\Photo::create([
                            'fbid' => $photo->id,
                            'uid_id' => $friendObject->id,
                            'link' => $photo->images[0]->source,
                            'width' => $photo->images[0]->width,
                            'height' => $photo->images[0]->height
                        ]);
                    }catch (\Exception $e){

                    }
                }
            }catch (\Exception $e){

            }
        }

        return "Đã backup xong !";
    }

}

