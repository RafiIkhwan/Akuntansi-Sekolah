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
        Schema::create('tbl_siswa', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->unsignedBigInteger('id_kelas');
            $table->unsignedBigInteger('id_spp');
            $table->char('nis', 8);
            $table->char('nisn', 12);
            $table->string('nama_siswa');
            $table->string('hp');
            $table->text('alamat');
            $table->timestamps();
            $table->date('deleted_at')->nullable();
            $table->foreign('id_kelas')
            ->references('id_kelas')
            ->on('tbl_kelas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_spp')
            ->references('id_spp')
            ->on('tbl_spp')
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
        Schema::dropIfExists('tbl_siswa');
    }
};
