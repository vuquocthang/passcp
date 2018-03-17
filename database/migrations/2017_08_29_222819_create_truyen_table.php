<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('truyen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->string('ten_khac')->nullable();
            $table->string('tac_gia')->nullable();
            $table->string('nhom_dich')->nullable();
            $table->string('tinh_trang')->nullable();
            $table->string('nguon')->nullable();
            $table->date('ngay_them');
            $table->integer('the_loai_id')->unsigned();
            $table->foreign('the_loai_id')->references('id')->on('the_loai');
            $table->rememberToken();
            $table->timestamps();
        });

        /*Schema::table('truyen', function(Blueprint $table) {
            $table->foreign('the_loai_id')->references('id')->on('the_loai');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('truyen');
    }
}
