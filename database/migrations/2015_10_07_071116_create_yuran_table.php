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
            $table->bigIncrements('id');
            $table->string('no_gaji', 10);
            $table->string('bulan_tahun');
            $table->float('yuran', 7, 2);
            $table->float('pertaruhan', 7, 2);
            $table->float('tka', 7, 2);
            $table->float('takaful', 7, 2);
            $table->float('potongan', 7, 2);
            $table->string('zon_gaji_id', 2);
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
