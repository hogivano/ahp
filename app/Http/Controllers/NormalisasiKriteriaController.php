<?php

namespace App\Http\Controllers;

use Auth;
use App\Kriteria;
use NormalisasiKriteria;
use SkorNormalisasiKriteria;
use TotalNormalisasiKriteria;
use Illuminate\Http\Request;

class NormalisasiKriteriaController extends Controller
{
    //
    public function index(){
      $idUser = Auth::getUser()->id;
      $kriteria = Kriteria::where('id_user', $idUser)->orderBy('id', 'ASC')->with('TotalNormalisasiKriteria')->get();
      $nilai = Kriteria::where('id_user', $idUser)->with(['NilaiNormalisasi1' => function($q){
        $q->with('Kriteria2')->orderBy('id_kriteria_2', 'ASC');
      }])->with('SkorNormalisasiKriteria')->orderBy('id', 'ASC')->get();
      // return response()->json($nilai);

      return view('admin.normalisasi.index', compact('kriteria', 'nilai'));
    }
}
