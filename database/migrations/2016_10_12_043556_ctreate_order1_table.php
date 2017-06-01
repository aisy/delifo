<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CtreateOrder1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->string('status');
            $table->integer('user_id');
            $table->integer('driver_id')->nullable();
            // table->integer('votes')->unsigned()->default(value)->nullable();
            $table->string('longitude');
            $table->string('latitude');
            $table->string('alamat');
            $table->timestamps();
        });

        Schema::table('order', function ($table){
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });

        Schema::table('order', function ($table){
            $table->foreign('driver_id')
            ->references('id')
            ->on('driver')
            ->onDelete('cascade');
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
