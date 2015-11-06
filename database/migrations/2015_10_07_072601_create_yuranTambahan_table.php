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
            $table->float('jumlah', 7, 2);
            $table->tinyInteger('sumbangan_id', false, false);
            $table->date('tarikh');
            $table->string('penerima');
            $table->string('no_gaji', 20);
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
