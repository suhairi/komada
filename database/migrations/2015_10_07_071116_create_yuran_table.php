<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYuranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yuran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_anggota');
            $table->string('bulan_tahun');
            $table->float('jumlah', 7, 2);
            $table->tinyInteger('yuran_tambahan_id');
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
        Schema::drop('yuran');
    }
}