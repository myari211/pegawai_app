<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangController extends Controller
{
    public function index(){

        $barang = DB::table('barang')->paginate(10);
        $mutasi = DB::table('mutasi_barang')->get();

        return view('barang', compact('barang', 'mutasi'));
    }

    public function add(Request $request){
        DB::table('barang')->insert([
            'id'=>$request->id,
            'kode_barang'=>$request->kode_barang,
            'nama_barang'=>$request->nama_barang,
            'satuan'=>$request->satuan,
            'harga_pembelian'=>$request->harga_pembelian,
            'harga_jual'=>$request->harga_jual
        ]);

        return redirect('/barang');
    }
    public function mutasi(){
        $mutasi = DB::table('mutasi_barang')->join('barang', 'mutasi_barang.kode_barang','=','barang.kode_barang')->get();

        return view('mutasi', compact('mutasi'));
    }

    public function mutasi_add(Request $request){
        DB::table('mutasi_barang')->insert([
            'id'=>$request->id,
            'nomor_transaksi'=>$request->nomor_transaksi,
            'kode_barang'=>$request->kode_barang,
            'keterangan'=>'null',
            'masuk'=>$request->masuk,
            'keluar'=>0,
        ]);

        return redirect('/barang/mutasi');
    }

    public function mutasi_out(Request $request){
        DB::table('mutasi_barang')->insert([
            'id'=>$request->id,
            'nomor_transaksi'=>$request->nomor_transaksi,
            'kode_barang'=>$request->kode_barang,
            'keterangan'=>'null',
            'masuk'=>0,
            'keluar'=>$request->keluar,
        ]);

        return redirect('/barang/mutasi');
    }
}
