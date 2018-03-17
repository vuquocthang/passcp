<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheLoaiTruyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('the_loai_truyen', function (Blueprint $table){

            $table->increments('id');
            $table->integer('truyen_id')->unsigned();
            $table->integer('the_loai_id')->unsigned();

            $table->foreign('truyen_id')->references('id')->on('truyen');
            $table->foreign('the_loai_id')->references('id')->on('the_loai');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('the_loai_truyen');
    }
}
