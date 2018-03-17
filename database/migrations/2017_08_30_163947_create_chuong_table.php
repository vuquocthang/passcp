<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChuongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('chuong', function (Blueprint $table){
            $table->increments('id');
            $table->string('ten');
            $table->integer('truyen_id')->unsigned();


        });

        Schema::table('chuong', function (Blueprint $table){
            $table->foreign('truyen_id')->references('id')->on('truyen');
            $table->text('noi_dung');
            $table->date('ngay_them');
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
        Schema::dropIfExists('chuong');
    }
}
