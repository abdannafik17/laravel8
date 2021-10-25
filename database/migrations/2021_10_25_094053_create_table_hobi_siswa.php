<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHobiSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobi_siswa', function (Blueprint $table) {
            $table->integer('id_siswa')->length(10)->unsigned()->index();
            $table->integer('id_hobi')->length(10)->unsigned()->index();
            $table->timestamps();

            $table->primary(['id_siswa', 'id_hobi']);

            $table->foreign('id_siswa')->references('id_siswa')->on('siswa')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_hobi')->references('id')->on('hobi')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hobi_siswa');
    }
}
