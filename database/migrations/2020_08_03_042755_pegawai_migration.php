<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PegawaiMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function(Blueprint $table){
            $table -> id();
            $table -> string('nama');
            $table -> string('alamat');
            $table -> date('tgl_lahir');
            $table -> string('jenis_kelamin');
            $table -> string('nomor_hp');
            $table -> string('email');
            $table -> string('kode_departement');
            $table -> string('kode_jabatan');
            $table -> string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pegawai');
    }
}
