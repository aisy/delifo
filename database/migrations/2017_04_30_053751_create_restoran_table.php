<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestoranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('restoran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_restoran');
            $table->string('lat');
            $table->string('lng');
            $table->string('formatted_address');
            $table->integer('no_telp');
            // table->integer('votes')->unsigned()->default(value)->nullable();

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
