<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $table = 'ranking';

    public $timestamps = false;

    protected $fillable = [
      "id", "id_alternatif", "nilai"
    ];
}
