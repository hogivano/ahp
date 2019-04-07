<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalNormalisasiKriteria extends Model
{

  protected $table = 'total_normalisasi_kriteria';

  public $timestamps = false;

  protected $fillable = [
    'id', 'id_kriteria', 'nilai'
  ];

  public function Kriteria(){
    return $this->belongsTo('App\Kriteria', 'id_kriteria', 'id');
  }
}
