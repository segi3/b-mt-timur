<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilitas', function (Blueprint $table) {
            $table->id();

            $table->string('no_util');
            $table->date('tanggal');
            $table->string('jenis_utilitas');
            $table->string('lokasi_utilitas');
            $table->string('status_utilitas');
            $table->string('keterangan');

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
        Schema::dropIfExists('utilitas');
    }
};
