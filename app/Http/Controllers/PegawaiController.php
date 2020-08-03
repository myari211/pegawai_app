<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pegawai;
use App\Jabatan;
use App\Departemen;

class PegawaiController extends Controller
{
    public function index(){

        $pegawai = Pegawai::all();
        $jabatan = Jabatan::all();
        $departement = Departemen::all();


        return view('pegawai', ['pegawai' => $pegawai, 'departement' => $departement, 'jabatan' => $jabatan]);
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

    protected function delete(Request $request){
        DB::table('jabatan')->where('id', $request->id)->delete();

        return redirect('/pegawai');
    }
}
