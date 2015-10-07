<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAkaunPotonganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akaunPotongan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_anggota');
            $table->tinyInteger('perkhidmatan_id', false, false);
            $table->float('jumlah', 7, 2);
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
        Schema::drop('akaunPotongan');
    }
}
