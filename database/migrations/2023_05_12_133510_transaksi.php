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
        Schema::create('tbl_transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_admin');
            $table->date('tanggal');
            $table->integer('total_bayar');
            $table->integer('sisa_bayar');
            $table->integer('kembali')->nullable();
            $table->string('bulan', 20);
            $table->timestamps();
            $table->foreign('id_siswa')
            ->references('id_siswa')
            ->on('tbl_siswa')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_admin')
            ->references('id_admin')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_transaksi');
    }
};
