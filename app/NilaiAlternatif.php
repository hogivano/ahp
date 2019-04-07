<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiAlternatif extends Model
{
    //
    protected $table = 'nilai_alternatif';

    public $timestamps = false;

    protected $fillable = [
      "id", "id_alternatif", "id_kriteria", "nilai"
    ];

    public function Kriteria(){
      return $this->belongsTo('App\Kriteria', 'id_kriteria', 'id');
    }
}
