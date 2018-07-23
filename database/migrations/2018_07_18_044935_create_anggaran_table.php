<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggaran', function (Blueprint $table) {
            $table->char('id_anggaran',2)->primary();
            $table->char('tahun_anggaran',4);
            $table->integer('jumlah_anggaran');
            $table->timestamps();
        });

        Schema::table('rekapitulasi_training', function (Blueprint $table) {
            $table->foreign('nik_pegawai')->references('nik_pegawai')->on('pegawai')->onUpdate('cascade')->onDelete('cascade');
            $table->char('id_training',2);
            $table->foreign('id_training')->references('id_training')->on('training')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('divisi', function (Blueprint $table) {
            $table->integer('id_direktorat')->unsigned()->nullable();
            $table->foreign('id_direktorat')->references('id_direktorat')->on('direktorat')->onUpdate('cascade')->onDelete('cascade');
        });
        
        Schema::table('departemen', function (Blueprint $table) {
            //$table->integer('id_divisi')->unsigned();
            $table->foreign('id_divisi')->references('id_divisi')->on('divisi')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('pegawai', function (Blueprint $table) {
            $table->foreign('id_departemen')->references('id_departemen')->on('departemen')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('kompetensi_jabatan', function (Blueprint $table) {
            $table->foreign('id_kompetensi')->references('id_kompetensi')->on('kompetensi')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('kompetensi_departemen', function (Blueprint $table) {
            $table->foreign('id_kompetensi')->references('id_kompetensi')->on('kompetensi')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_departemen')->references('id_departemen')->on('departemen')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('training', function (Blueprint $table) {
            $table->integer('id_media')->unsigned();
            $table->char('id_topik',1);
            $table->integer('id_penyelenggara')->unsigned();
            $table->foreign('id_media')->references('id_media')->on('media')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_topik')->references('id_topik')->on('topik')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_penyelenggara')->references('id_penyelenggara')->on('penyelenggara')->onUpdate('cascade')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggaran');
    }
}
