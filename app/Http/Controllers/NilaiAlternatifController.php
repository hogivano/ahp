<?php

namespace App\Http\Controllers;

use Auth;
use App\Alternatif;
use App\Kriteria;
use App\NilaiAlternatif;
use Illuminate\Http\Request;

class NilaiAlternatifController extends Controller
{
    //
    public function index(){
      $idUser = Auth::getUser()->id;
      $alternatif = Alternatif::where('id_user', $idUser)->with(['NilaiAlternatif' => function($q){
        $q->orderBy('id_kriteria', 'ASC');
      }])->get();
      $kriteria = Kriteria::where('id_user', $idUser)->orderBy('id', 'ASC')->get();
      // return response()->json($alternatif);
      return view('admin.nilai-alternatif.index', compact('alternatif', 'kriteria'));
    }

    public function new(){
      $idUser = Auth::getUser()->id;

      $kriteria = Kriteria::where('id_user', $idUser )->orderBy('id', 'ASC')->get();
      $alternatif = Alternatif::where('id_user', $idUser)->orderBy('id', 'ASC')->get();
      return view('admin.nilai-alternatif.new', compact('kriteria', 'alternatif'));
    }

    public function create(Request $req){
      // return response()->json($req->all());
      $idUser = Auth::getUser()->id;
      foreach ($req->all() as $v) {
        # code...
        if ($v != $req['_token'] && $v != $req['btn_kategori']){
          if (!is_numeric($v)){
            return response()->json(['error' => true, 'message' => 'value harus dalam bentuk angka']);
          }
        }
      }

      // foreach ($req->all() as $i) {
      //   # code...
      //   if ($i != $req['_token'] && $i != $req['btn_kategori']){
      //     $arr = explode('_', $i);
      //     $cek = NilaiAlternatif::where('id_alternatif', $arr[0])->where('id_kriteria', $arr[1])->first();
      //     if ($cek){
      //       $update = NilaiAlternatif::where('id', $cek->id)->update([
      //         'nilai' => $i
      //       ]);
      //     } else {
      //       $new = new NilaiAlternatif();
      //       $new->id_alternatif = $arr[0];
      //       $new->id_kriteria = $arr[1];
      //       $new->save();
      //     }
      //   }
      // }

      $kriteria = Kriteria::where('id_user', $idUser)->orderBy('id', 'ASC')->get();
      $alternatif = Alternatif::where('id_user', $idUser)->orderBy('id', 'ASC')->get();

      foreach ($alternatif as $i) {
        foreach ($kriteria as $j) {
          $cek = NilaiAlternatif::where('id_alternatif', $i->id)->where('id_kriteria', $j->id)->first();
          if ($cek){
            $update = NilaiAlternatif::where('id', $cek->id)->update([
              'nilai' => $req[$i->id . '_' . $j->id]
            ]);
          } else {
            $new = new NilaiAlternatif();
            $new->id_alternatif = $i->id;
            $new->id_kriteria = $j->id;
            $new->nilai = $req[$i->id . '_' . $j->id];
            $new->save();
          }
        }
      }
      return redirect()->route('nilai-alternatif.index');
    }

}
