<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryStory extends Model
{
    //

    protected $table = 'the_loai_truyen';

    protected $fillable = ['truyen_id', 'the_loai_id'];
}
