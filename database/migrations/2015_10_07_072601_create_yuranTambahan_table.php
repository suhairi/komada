<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYuranTambahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yuranTambahan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->float('jumlah', 7, 2);
            $table->tinyInteger('sumbangan_id', false, false);
            $table->string('penerima');
            $table->string('no_anggota', 20);
            $table->string('tarikh');
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
        Schema::drop('yuranTambahan');
    }
}
