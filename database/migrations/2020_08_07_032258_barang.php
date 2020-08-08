<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Barang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function(Blueprint $table){
            $table->unsignedInteger('id');
            $table->string('kode_barang');
            $table->string('satuan');
            $table->string('harga_pembelian');
            $table->string('harga_jual');
            $table->primary('kode_barang');
        });

        Schema::table('stok_akhir_barang', function($table){
            $table->foreign('kode_barang')->references('kode_barang')->on('barang');
        });

        Schema::table('mutasi_barang', function($table){
            $table->foreign('kode_barang')->references('kode_barang')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
