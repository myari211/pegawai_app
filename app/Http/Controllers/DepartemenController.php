<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Departemen;

class DepartemenController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $departement = DB::table('departement')->get();
        return view('department', ['departement'=> $departement]);
    }

    protected function add(Request $request){
        DB::table('departement')->insert([
            'id_departement' => $request->id,
            'kode_departement' => $request->kode_departement,
            'departement'=> $request ->departement
        ]);
        return redirect('/department');
    }

    protected function edit(Request $request){
        DB::table('departement')->where('id_departement', $request->id)->update([
            'departement'=> $request->departement,
            'kode_departement' => $request->kode_departement
        ]);
        return redirect('/department');
    }

    protected function delete(Request $request){
        DB::table('departement')->where('id_departement', $request->id)->delete();

        return redirect('/department');
    }
}
