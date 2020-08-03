<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = "jabatan";
    protected $primaryKey = "id";
    protected $fillable = ['jabatan'];

    public function pegawai_jabatan(){
        return $this->hasMany(Pegawai::class, 'kode_jabatan');
    }
}
