<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaranKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluaran_kas', function (Blueprint $table) {
            $table->id();
            $table->string('id_pengeluaran_kas', 10)->unique();
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('id_proyek');
            $table->unsignedInteger('id_akun');
            $table->string('keterangan_pengeluaran', 30);
            $table->date('tanggal_pengeluaran');
            $table->integer('total_pengeluaran')->nullable()->default(null);
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
        Schema::dropIfExists('pengeluaran_kas');
    }
}