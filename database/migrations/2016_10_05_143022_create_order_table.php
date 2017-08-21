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
            $table->integer('order_id');
            $table->integer('menu_id');
            $table->integer('restoran_id');
            $table->integer('harga');
            $table->text('keterangan');
            $table->text('status');
            $table->text('alamat');
            $table->text('jumlah');
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
