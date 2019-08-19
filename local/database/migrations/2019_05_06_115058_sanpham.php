<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->char('ma', 10);
            $table->string('ten', 100)->nullable();
            $table->double('gia')->nullable();
            $table->char('avatar', 100)->nullable();
            $table->longText('mota')->nullable();
            $table->integer('idnguoidung')->unsigned();
            $table->foreign('idnguoidung')->references('id')->on('nguoidung');
            $table->integer('idloai')->unsigned();
            $table->foreign('idloai')->references('id')->on('loai');
            $table->integer('idhang')->unsigned();
            $table->foreign('idhang')->references('id')->on('hang');
            
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
    }
}
