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
            'jabatan'=> $request ->jabatan
        ]);
        return redirect('/jabatan');
    }

    protected function edit(Request $request){
        DB::table('jabatan')->where('id', $request->id)->update([
            'jabatan'=> $request->jabatan
        ]);
        return redirect('/jabatan');
    }

    protected function delete(Request $request){
        DB::table('jabatan')->where('id', $request->id)->delete();

        return redirect('/jabatan');
    }
}
