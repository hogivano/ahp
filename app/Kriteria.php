<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    //
    protected $table = 'kriteria';

    public $timestamps = false;

    protected $fillable = [
      "id", "id_user", "kriteria"
    ];

    public function NilaiKriteria1(){
      return $this->hasMany('App\NilaiKriteria', 'id_kriteria_1', 'id');
    }

    public function NilaiKriteria2(){
      return $this->hasMany('App\NilaiKriteria', 'id_kriteria_2', 'id');
    }

    public function NilaiNormalisasi1(){
      return $this->hasMany('App\NormalisasiKriteria', 'id_kriteria_1', 'id');
    }
    public function NilaiNormalisasi2(){
      return $this->hasMany('App\NormalisasiKriteria', 'id_kriteria_2', 'id');
    }

    public function SkorNormalisasiKriteria(){
      return $this->hasOne('App\SkorNormalisasiKriteria', 'id_kriteria', 'id');
    }

    public function TotalNormalisasiKriteria(){
      return $this->hasOne('App\TotalNormalisasiKriteria', 'id_kriteria', 'id');
    }
}
