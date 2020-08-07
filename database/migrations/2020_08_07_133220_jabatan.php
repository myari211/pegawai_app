<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jabatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatan', function(Blueprint $table){
            $table->unsignedInteger('id_jabatan');
            $table->string('kode_jabatan');
            $table->string('jabatan');
            $table->primary('kode_jabatan');
        });

        Schema::table('pegawai', function($table){
            $table->foreign('kode_jabatan')->references('kode_jabatan')->on('jabatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jabatan');
    }
}
