<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id){
        $profile = DB::table('pegawai')->where('id', $id)->join('departement', 'pegawai.kode_departement','=','departement.kode_departement')->join('jabatan', 'pegawai.kode_jabatan','=','jabatan.kode_jabatan')->get();
    
        return view('profile', compact('profile'));
    }
}
