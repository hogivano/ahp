<?php

namespace App\Http\Controllers;

use Auth;
use App\Ranking;
use App\Alternatif;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    //
    public function index(){
      $idUser = Auth::getUser()->id;
      $alternatif = Alternatif::where('id_user', $idUser)->join('ranking', 'alternatif.id', '=', 'ranking.id_alternatif')->orderBy('ranking.nilai', 'DESC')->get();
      return view('admin.ranking.index', compact('alternatif'));
    }
}
