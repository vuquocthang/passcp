<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table='photo';

    protected $fillable = [
        'fbid',
        'uid_id',
        'link',
        'width',
        'height'
    ];
}
