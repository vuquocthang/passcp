<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 9/3/2017
 * Time: 7:58 PM
 */

namespace App;


use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $table = 'chuong';

    protected $fillable = [

        'ten',
        'truyen_id',
        'noi_dung',
        'ngay_them',
        'status'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'ten',
                'unique'          => false,
            ],

        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}