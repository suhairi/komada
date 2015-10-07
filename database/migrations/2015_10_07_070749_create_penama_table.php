<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenamaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penama', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no_anggota', false, false);
            $table->string('nama1');
            $table->bigInteger('noKP1', false, true);
            $table->text('alamat1');
            $table->string('nama2');
            $table->bigInteger('noKP2', false, true);
            $table->text('alamat2');
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
        Schema::drop('penama');
    }
}
