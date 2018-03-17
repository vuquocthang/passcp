<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 9/5/2017
 * Time: 4:54 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table ='ads';

    protected $fillable = ['image_link'];

}