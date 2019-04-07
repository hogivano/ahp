<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkorNormalisasiKriteria extends Model
{
    //
    protected $table = 'skor_normalisasi_kriteria';

    public $timestamps = false;

    protected $fillable = [
      'id', 'id_kriteria', 'skor', 'persen'
    ];

    public function Kriteria(){
      return $this->belongsTo('App\Kriteria', 'id_kriteria', 'id');
    }
}
