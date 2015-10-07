<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePotonganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potongan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no_anggota', false);
            $table->float('jumlah', 7, 2);
            $table->tinyInteger('tempoh', false, false);
            $table->float('baki', 7, 2);
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
        Schema::drop('potongan');
    }
}
