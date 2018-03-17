<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    //
    use Sluggable;

    protected $table = 'cat';

    protected $guarded = [];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function parent(){
        if ($this->parent_id == null){
            return "Gốc";
        }

        return Cat::find($this->parent_id)->name;
    }

    public function childs(){
        return Cat::where('parent_id', $this->id)->orderBy('order', 'ASC')->get();
    }
}
