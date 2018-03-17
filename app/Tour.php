<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    //
    use Sluggable;

    protected $table = 'tour';

    protected $guarded = [];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function photo(){

        return url('public/tours/' . $this->img);
    }

    public function cat(){
        return Cat::find($this->cat_id)->name;
    }


}
