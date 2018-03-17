<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopRead extends Model
{
    //
    protected $table ='top_read';

    protected $fillable = ['chuong_id'];
}
