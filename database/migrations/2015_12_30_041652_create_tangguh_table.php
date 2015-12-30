<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTangguhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tangguh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_gaji');
            $table->integer('akaunpotongan_id', false, false);
            $table->timestamp('dari');
            $table->timestamp('sehingga');
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
        Schema::drop('tangguh');
    }
}
