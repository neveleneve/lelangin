<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_lots', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id');
            $table->string('kode_lot');
            $table->integer('harga_awal');
            $table->bigInteger('waktu_mulai');
            $table->bigInteger('waktu_selesai');
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
        Schema::dropIfExists('bid_lots');
    }
}
