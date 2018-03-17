<?php
namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 9/3/2017
 * Time: 7:09 PM
 */
class Category extends Model
{
    use Sluggable;

    protected $table = 'the_loai';

    protected $fillable = ['ten', 'status'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
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