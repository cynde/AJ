<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training', function (Blueprint $table) {
            $table->char('id_training',2);
            $table->primary('id_training');
            $table->string('nama_training',20);
            $table->date('tanggal_training');
            $table->time('time_start');
            $table->time('time_finish');
            $table->integer('jumlah_jam_training');
            $table->integer('harga_training');
            $table->integer('invoice_training');
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
        Schema::dropIfExists('training');
    }
}
