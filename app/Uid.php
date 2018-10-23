<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Uid extends Model
{
    protected $table='uid';

    protected $fillable = [
        'user_id',
        'type',
        'uid',
        'pw',
        'token',
        'name',
        'birthday',
        'status',
        'friend_of',
        'backup_at',
        'group_id'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function group(){
        $group = $this->belongsTo('\App\Group');

        return $group->count() > 0 ? $group->first() : false;
    }

    public function photos(){
        return $this->hasMany('\App\Photo');
    }

    public function friends(){
        return $this->hasMany('\App\Uid', 'friend_of', 'id')->with('photos');
    }

    //lấy danh sách ảnh cần xác minh
    public function getListPhoto($names){

        return $this->friends()->whereIn('name', $names)->get();
    }

    // phát hiện ảnh của bạn bè
    public function detectImage($choicesName, $imageLink){

        $names = [];

        foreach ($choicesName as $name){
            $names[] = $name;
        }

        $listPhotos = $this->getListPhoto($names);

        //var_dump($listPhotos);

        $pythonServerUrl = "http://localhost:5000/process";

        $client = new \GuzzleHttp\Client();

        $res = $client->post($pythonServerUrl, [
            'form_params'  => [
                'data' => json_encode($listPhotos),
                'image_link' => $imageLink
            ],
        ]);

        //echo $res->getBody()->getContents();

        return $res->getBody()->getContents();

    }

    public function backupAt()
    {
        try {
            return Carbon::createFromFormat("Y-m-d H:i:s", $this->backup_at)->format('H:i:s d-m-Y');

        }catch (\Exception $e){
            return "";
        }
    }

    public function birthdayDay(){
        try {
            return Carbon::createFromFormat("Y-m-d", $this->birthday )->format('d');

        }catch (\Exception $e){
            return "";
        }
    }

    public function birthdayMonth(){
        try {
            return Carbon::createFromFormat("Y-m-d", $this->birthday )->format('m');

        }catch (\Exception $e){
            return "";
        }
    }

    public function birthdayYear(){
        try {
            return Carbon::createFromFormat("Y-m-d", $this->birthday )->format('Y');

        }catch (\Exception $e){
            return "";
        }
    }
}
