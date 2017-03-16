<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap');
            $table->string('username');
            $table->string('password', 60);
            $table->string('jkel');
            $table->bigInteger('telpon');
            $table->rememberToken();
            $table->timestamps();
        });

        // Schema::table('admin', function($table){
        //     $table->
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin');
    }
}
