<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKompetensiJabatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kompetensi_jabatan', function (Blueprint $table) {
            $table->increments('id_kompetensi_jabatan')->unsigned();
            $table->char('id_kompetensi',2);
            $table->string('id_jabatan',50);
            $table->integer('level_kompetensi');
            $table->string('kompetensi_pendahulu',100);
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
        Schema::dropIfExists('kompetensi_jabatan');
    }
}
