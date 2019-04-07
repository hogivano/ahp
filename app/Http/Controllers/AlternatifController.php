<?php

namespace App\Http\Controllers;

use Auth;
use App\Alternatif;
use App\NilaiAlternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    //
    public function index(){
      $idUser  = Auth::getUser()->id;
      $alternatif = Alternatif::where('id_user', $idUser)->get();
      return view('admin.alternatif.index', compact('alternatif'));
    }

    public function new(){
      return view('admin.alternatif.new');
    }

    public function edit($id){
      $alternatif = Alternatif::where('id', $id)->first();
      return view('admin.alternatif.edit', compact('alternatif'));
    }

    public function create(Request $req){
      $new = new Alternatif();
      $new->id_user = Auth::getUser()->id;
      $new->alternatif = $req->alternatif;
      $new->save();
      return redirect()->route('alternatif.index');
    }

    public function update(Request $req, $id){
      $update = Alternatif::where('id', $id)->update([
        'alternatif' => $req->alternatif
      ]);

      return redirect()->route('alternatif.index');
    }

    public function delete(Request $req){
      $del = Alternatif::where('id', $req->id)->delete();
      $del = NilaiAlternatif::where('id_alternatif', $req->id)->delete();

      return redirect()->route('alternatif.index');
    }
}
