<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KonsistensiKriteria extends Model
{
    //
    protected $table = 'konsistensi_kriteria';

    public $timestamps = false;

    protected $fillable = [
      'id', 'id_kriteria', 'nilai'
    ];

    public function Kriteria(){
      return $this->belongsTo('App\Kriteria', 'id_kriteria_1', 'id');
    }
}
