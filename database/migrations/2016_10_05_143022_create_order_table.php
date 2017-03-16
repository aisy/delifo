<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_order');
            $table->text('nama_order');
            $table->text('keterangan');
            $table->text('status');
            $table->text('alamat');
            $table->string('longitude');
            $table->string('latitude');
            $table->timestamps();
        });

        // Schema::table('detail_order', function ($table){
        //     $table->foreign('id_order')
        //           ->references('id_order')
        //           ->on('order')
        //           ->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order');
    }
}
