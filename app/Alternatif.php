<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    //
    protected $table = 'alternatif';

    public $timestamps = false;

    protected $fillable = [
      "id", "id_user", "alternatif"
    ];

    public function NilaiAlternatif(){
      return $this->hasMany('App\NilaiAlternatif', 'id_alternatif', 'id');
    }

    public function PembobotanAlternatif(){
      return $this->hasMany('App\PembobotanAlternatif', 'id_alternatif', 'id');
    }

    public function Ranking(){
      return $this->hasOne('App\Ranking', 'id_alternatif', 'id');
    }
}
