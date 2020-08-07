<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index(){
        $pegawai = DB::table('pegawai')->join('departement','pegawai.kode_departement','=','departement.kode_departement')->join('jabatan','pegawai.kode_jabatan','=','jabatan.kode_jabatan')->get();
        $pegawai_edit = DB::table('pegawai')->get();
        $jabatan = DB::table('jabatan')->get();
        $departement = DB::table('departement')->get(); 



        return view('pegawai',compact('pegawai','pegawai_edit','departement','jabatan'));
    }

    protected function add(Request $request){
        DB::table('pegawai')->insert([
            'nama'=> $request ->nama,
            'alamat'=> $request ->alamat,
            'tgl_lahir'=> $request ->tgl_lahir,
            'jenis_kelamin' => $request ->jenis_kelamin,
            'nomor_hp' => $request ->nomor,
            'email' => $request ->email,
            'kode_departement' => $request ->department,
            'kode_jabatan' => $request ->jabatan,
            'status' => $request ->status
        ]);
        return redirect('/pegawai');
    }

    protected function edit(Request $request){
        DB::table('pegawai')->where('id', $request->id)->update([
            'nama'=> $request ->nama,
            'alamat'=> $request ->alamat,
            'tgl_lahir'=> $request ->tgl_lahir,
            'jenis_kelamin' => $request ->jenis_kelamin,
            'nomor_hp' => $request ->nomor,
            'email' => $request ->email,
            'kode_departement' => $request ->department,
            'kode_jabatan' => $request ->jabatan,
            'status' => $request ->status
        ]);
        return redirect('/pegawai');
    }

    public function delete(Request $request){
        DB::table('pegawai')->where('id', $request->id)->delete();

        return redirect('/pegawai');
    }
}
