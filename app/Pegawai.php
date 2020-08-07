<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = "pegawai";
    protected $primaryKey = "id";
    protected $fillable =   ['nama',
                            'alamat',
                            'tgl_lahir',
                            'jenis_kelamin',
                            'nomor_hp',
                            'email',
                            'kode_departement',
                            'kode_jabatan',
                            'status'];

    public function departement(){
        return $this->belongsTo(Departemen::class, 'id');
    }
    public function jabatan(){
        return $this->belongsTo(Jabatan::class, 'id');
    }
}