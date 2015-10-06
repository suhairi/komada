<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->integer('no_anggota')->unsigned;
            $table->string('nama');
            $table->bigInteger('nokp', false, true)->nullable;
            $table->string('jantina', 10);
            $table->string('bangsa');
            $table->string('agama', 15);
            $table->string('email', 100);
            $table->text('alamat1');
            $table->text('alamat2');
            $table->date('tarikh_khidmat');
            $table->string('jawatan');
            $table->string('taraf_jawatan');
            $table->tinyInteger('status', false, true)->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profile');
    }
}
