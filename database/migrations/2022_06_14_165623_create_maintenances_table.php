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
        Schema::create('maintenance', function (Blueprint $table) {
            $table->id();

            $table->string('no_util');
            $table->date('jadwal_maintenance');
            $table->string('uraian_pekerjaan');
            $table->string('status_pekerjaan');
            $table->string('keterangan');
            $table->string('nama_teknisi')->default('-');

            $table->unsignedBigInteger('utilitas_id')->nullable();

            $table->timestamps();

            $table->foreign('utilitas_id')->references('id')->on('utilitas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenance');
    }
};
