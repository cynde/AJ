<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKompetensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kompetensi', function (Blueprint $table) {
            $table->char('id_kompetensi',2)->primary();
            $table->string('nama_kompetensi',100);
            $table->char('level_kompetensi',1);
            $table->string('kompetensi_pendahulu',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kompetensi');
    }
}
