<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap');
            $table->string('telpon');
            $table->string('jkel');
            $table->string('gambar');
            $table->string('username',30);
            $table->string('password');

            // $table->string('id_autentikasi');
            $table->rememberToken();
            $table->timestamps();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('driver');
    }
}
