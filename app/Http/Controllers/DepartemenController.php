<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Departemen;

class DepartemenController extends Controller
{
    public function index(){
        $departemen = Departemen::all();
        return view('department', ['departemen'=> $departemen]);
    }

    protected function add(Request $request){
        DB::table('departement')->insert([
            'departement'=> $request ->departemen
        ]);
        return redirect('/department');
    }

    protected function edit(Request $request){
        DB::table('departement')->where('id', $request->id)->update([
            'departement'=> $request->departemen
        ]);
        return redirect('/department');
    }

    protected function delete(Request $request){
        DB::table('departement')->where('id', $request->id)->delete();

        return redirect('/department');
    }
}
