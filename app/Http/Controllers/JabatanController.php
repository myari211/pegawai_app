<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JabatanController extends Controller
{
    public function index(){

        $jabatan=DB::table('jabatan')->paginate(8);

        return view('jabatan', ['jabatan' => $jabatan]);
    }

    protected function add(Request $request){
        DB::table('jabatan')->insert([
            'id_jabatan' => $request ->id,
            'kode_jabatan' => $request ->kode_jabatan,
            'jabatan'=> $request ->jabatan
        ]);
        
        return redirect('/jabatan');
    }

    protected function edit(Request $request){
        DB::table('jabatan')->where('id_jabatan', $request->id)->update([
            'kode_jabatan' => $request->kode_jabatan,
            'jabatan'=> $request->jabatan
        ]);
        return redirect('/jabatan');
    }

    protected function delete(Request $request){
        DB::table('jabatan')->where('id_jabatan', $request->id)->delete();

        return redirect('/jabatan');
    }
}
