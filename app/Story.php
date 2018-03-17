<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 9/3/2017
 * Time: 7:56 PM
 */

namespace App;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use Sluggable;

    protected $table = 'truyen';

    protected $fillable = [
        'ten',
        'ten_khac',
        'tac_gia',
        'nhom_dich',
        'tinh_trang',
        'mo_ta',
        'nguon',
        'ngay_them',
        'the_loai_id',
        'status',
        'image_link'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'ten'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}