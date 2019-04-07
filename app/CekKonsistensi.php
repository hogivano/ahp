<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CekKonsistensi extends Model
{
    //
    protected $table = 'cek_konsistensi';

    public $timestamps = false;

    protected $fillable = [
      'id', 'id_user', 'ci', 'ri', 'cr', 'p', 'cr_persen'
    ];
}
