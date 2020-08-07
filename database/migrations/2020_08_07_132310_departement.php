<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Departement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departement', function(Blueprint $table){
            $table -> unsignedInteger('id_departement');
            $table -> string('kode_departement');
            $table -> string('departement');
            $table -> primary('kode_departement');
        });

        Schema::table('pegawai', function($table){
            $table->foreign('kode_departement')->references('kode_departement')->on('departement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('departement');
    }
}
