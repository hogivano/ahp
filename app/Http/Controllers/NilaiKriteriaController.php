<?php

namespace App\Http\Controllers;

use Auth;
use App\Kriteria;
use App\NilaiKriteria;
use Illuminate\Http\Request;

class NilaiKriteriaController extends Controller
{
    //
    public function index(){
      $idUser = Auth::getUser()->id;
      $kriteria = Kriteria::where('id_user', $idUser)->orderBy('id', 'ASC')->get();
      $nilai = Kriteria::where('id_user', $idUser)->with(['NilaiKriteria1' => function($q){
        $q->with('Kriteria2')->orderBy('id_kriteria_2', 'ASC');
      }])->orderBy('id', 'ASC')->get();
      // return response()->json($nilai);
      return view('admin.nilai-kriteria.index', compact('kriteria', 'nilai'));
    }

    public function new(){
      $idUser = Auth::getUser()->id;
      $kriteria = Kriteria::where('id_user', $idUser)->get();
      // return response()->json($kriteria[0]['kriteria']);
      return view('admin.nilai-kriteria.new', compact('kriteria'));
    }

    public function create(Request $req){
      $idUser = Auth::getUser()->id;
      $kriteria = Kriteria::where('id_user', $idUser)->get();

      $ceknol = false;
      for ($l=0; $l < sizeof($kriteria); $l++) {
        for ($r= $l+1; $r < sizeof($kriteria); $r++) {
          if ($req[$kriteria[$l]['id'] . '_' . $kriteria[$r]['id']] == 0 && $req[$kriteria[$r]['id'] . '_' . $kriteria[$l]['id']] == 0){
            $ceknol = true;
            return response()->json(['error' => true, 'message' => 'salah satu pasangan harus diisi']);
          }
        }
      }

      for ($l=0; $l < sizeof($kriteria); $l++) {
        for ($r= $l+1; $r < sizeof($kriteria); $r++) {
          if ($req[$kriteria[$l]['id'] . '_' . $kriteria[$r]['id']] == 0){
            // null
            $cek = NilaiKriteria::where('id_kriteria_1', $kriteria[$l]['id'])->where('id_kriteria_2', $kriteria[$r]['id'])->first();
            if ($cek){
              $update = NilaiKriteria::where('id', $cek->id)->update([
                'nilai' => 1 / $req[$kriteria[$r]['id'] . '_' . $kriteria[$l]['id']]
              ]);
            } else {
              $new = new NilaiKriteria();
              $new->id_kriteria_1 = $kriteria[$l]['id'];
              $new->id_kriteria_2 = $kriteria[$r]['id'];
              $new->nilai = 1 / $req[$kriteria[$r]['id'] . '_' . $kriteria[$l]['id']];
              $new->save();
            }
            // return response()->json(['req' => $req->all(), 'id' => $kriteria[$l]['id'] . '_' . $kriteria[$r]['id'] ]);
          } else {
            //ada value
            $cek = NilaiKriteria::where('id_kriteria_1', $kriteria[$l]['id'])->where('id_kriteria_2', $kriteria[$r]['id'])->first();
            if ($cek){
              $update = NilaiKriteria::where('id', $cek->id)->update([
                'nilai' => $req[$kriteria[$l]['id'] . '_' . $kriteria[$r]['id']]
              ]);
            } else {
              $new = new NilaiKriteria();
              $new->id_kriteria_1 = $kriteria[$l]['id'];
              $new->id_kriteria_2 = $kriteria[$r]['id'];
              $new->nilai = $req[$kriteria[$l]['id'] . '_' . $kriteria[$r]['id']];
              $new->save();
            }
          }

          if ($req[$kriteria[$r]['id'] . '_' . $kriteria[$l]['id']] == 0){
            //null
            $cek = NilaiKriteria::where('id_kriteria_1', $kriteria[$r]['id'])->where('id_kriteria_2', $kriteria[$l]['id'])->first();
            if ($cek){
              $update = NilaiKriteria::where('id', $cek->id)->update([
                'nilai' => 1 / $req[$kriteria[$l]['id'] . '_' . $kriteria[$r]['id']]
              ]);
            } else {
              $new = new NilaiKriteria();
              $new->id_kriteria_1 = $kriteria[$r]['id'];
              $new->id_kriteria_2 = $kriteria[$l]['id'];
              $new->nilai = 1 / $req[$kriteria[$l]['id'] . '_' . $kriteria[$r]['id']];
              $new->save();
            }
            // return response()->json(['req' => $req->all(), 'id' => $kriteria[$r]['id'] . '_' . $kriteria[$l]['id'] ]);
          } else {
            //ada value
            $cek = NilaiKriteria::where('id_kriteria_1', $kriteria[$r]['id'])->where('id_kriteria_2', $kriteria[$l]['id'])->first();
            if ($cek){
              $update = NilaiKriteria::where('id', $cek->id)->update([
                'nilai' => $req[$kriteria[$r]['id'] . '_' . $kriteria[$l]['id']]
              ]);
            } else {
              $new = new NilaiKriteria();
              $new->id_kriteria_1 = $kriteria[$r]['id'];
              $new->id_kriteria_2 = $kriteria[$l]['id'];
              $new->nilai = $req[$kriteria[$r]['id'] . '_' . $kriteria[$l]['id']];
              $new->save();
            }
          }
        }
      }

      for ($i=0; $i < sizeof($kriteria); $i++) {
        # code...
        $cek = NilaiKriteria::where('id_kriteria_1', $kriteria[$i]['id'])->where('id_kriteria_2', $kriteria[$i]['id'])->first();
        if ($cek){
          $update = NilaiKriteria::where('id', $cek->id)->update([
            'nilai' => 1
          ]);
        } else {
          $new = new NilaiKriteria();
          $new->id_kriteria_1 = $kriteria[$i]['id'];
          $new->id_kriteria_2 = $kriteria[$i]['id'];
          $new->nilai = 1;
          $new->save();
        }
      }
      return redirect()->route('kriteria.index');
      // return response()->json($req->all());
      // return response()->json($req['1_3']);
    }
}
