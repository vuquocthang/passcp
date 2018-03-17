<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 9/7/2017
 * Time: 3:19 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'slide';

    protected $fillable = ['truyen_id', 'chuong_id'];

}