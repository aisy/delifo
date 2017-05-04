<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('menu', function(Blueprint $table){
          $table->increments('id');
          $table->integer('restoran_id');
          $table->string('nama_menu');
          $table->string('gambar');
          $table->integer('harga');
          $table->string('deskripsi');
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
    }
}
