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
            $table->string('no_gaji', 10);
            $table->tinyInteger('perkhidmatan_id', false, false);
            $table->float('jumlah', 7, 2);
            $table->tinyInteger('tempoh', false, false);
            $table->float('kadar', 4, 2);
            $table->float('caj_proses', 7, 2);
            $table->float('bayaran_perkhidmatan', 7, 2);
            $table->float('insurans', 7, 2);
            $table->float('jumlah_keseluruhan', 7, 2);
            $table->float('baki', 7, 2);
            $table->float('bulanan', 7, 2);
            $table->tinyInteger('status', false, false);
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
