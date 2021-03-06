<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = "departement";
    protected $primaryKey = "id";
    protected $fillable = ['departement']; 

    public function pegawai_departement(){
        return $this->hasMany(Pegawai::class, 'kode_departement');
    }
}
