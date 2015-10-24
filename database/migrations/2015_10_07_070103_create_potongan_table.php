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

    // This table is for the system to refer amount to deduct from the salary monthly.
    // It will be updated when a new loan is submitted (Wang Tunai, Tayar Bateri, Roadtax, Insurans etc)
    public function up()
    {
        Schema::create('potongan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_gaji', 10);
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
        Schema::drop('potongan');
    }
}
