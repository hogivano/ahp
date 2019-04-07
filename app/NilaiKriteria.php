<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiKriteria extends Model
{
    //
    protected $table = 'nilai_kriteria';

    public $timestamps = false;

    protected $fillable = [
      'id', 'id_kriteria_1', 'id_kriteria_2', 'nilai'
    ];

    public function Kriteria1(){
      return $this->belongsTo('App\Kriteria', 'id_kriteria_1', 'id');
    }

    public function Kriteria2(){
      return $this->belongsTo('App\Kriteria', 'id_kriteria_2', 'id');
    }
}
