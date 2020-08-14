<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StokAkhirController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        
        $i = 0;

       $stok = DB::table('mutasi_barang')
       ->join('barang', 'mutasi_barang.kode_barang','=', 'barang.kode_barang')
       ->groupBy('nama_barang')
       ->select('*', DB::raw('sum(masuk - keluar) as total'))
       ->get();

       $profit = DB::table('mutasi_barang')
       ->join('barang', 'mutasi_barang.kode_barang', '=', 'barang.kode_barang')
       ->groupBy('nama_barang')
       ->select('*', DB::raw('sum(keluar * harga_jual) as profit'))
       ->get();

        return view('stok_akhir', compact('stok', 'profit'));
    }
}
