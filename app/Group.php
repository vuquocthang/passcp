<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table='group';

    protected $fillable = [
        'name',
        'user_id'
    ];

    public function uids(){
        return $this->hasMany('\App\Uid');
    }
}
