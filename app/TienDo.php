<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TienDo extends Model
{
    //
    protected $table ='tien_do';

    protected $guarded = [];

    public function performDate(){

        $date = date_create($this->perform_date);
        return date_format( $date,"d-m-Y");
    }
}
