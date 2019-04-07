<?php

namespace App\Http\Controllers;

use Redirect;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    //
    public function login(Request $req){
      $message = [
            'username.required'    => 'username harus diisi',
            'password.required' => 'password harus diisi',
        ];
        $rules = [
            'username' => 'required',
            'password' => [
                'required',
            ],
        ];
        $validator = $this->validator($req->all(), $rules, $message);
        if ($validator->fails()){
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $user = User::where('username', $req->username)->first();
        if (!empty($user)){
            if (Hash::check($req->password, $user->password)){
                Auth::attempt(['username' => $req->username, 'password' => $req->password], $req->has('remember'));
                return redirect()->route('dashboard');
            } else {
                $errors = [
                    'password' => 'Email atau password yang anda masukan salah'
                ];
                return Redirect::back()->withInput()->withErrors($errors);
            }
        } else {
            $errors = [
                'password' => 'Email atau password yang anda masukan salah'
            ];
            return Redirect::back()->withInput()->withErrors($errors);
        }
    }

    public function register(Request $req){
      $message = [
            'username.required' => 'username harus diisi',
            'username.min' => 'username minimal 4 karakter',
            'username.unique' => 'username sudah terdaftar',
            'password.required' => 'password harus diisi',
            'password.min' => 'password minimal 8 karakter',
        ];
        $rules = [
            'username' => 'required|min:4|unique:users',
            'password' => [
                'required',
                'min:6',
            ],
        ];
        $validator = $this->validator($req->all(), $rules, $message);
        if ($validator->fails()){
            return response()->json(['error' => true, 'messages' => $validator->messages()]);
        }
        User::create([
            'username' => $req->username,
            'password' => Hash::make($req->password),
        ]);
        return response()->json(['error' => false, 'messages' => 'akun berhasil ditambahkan silahkan login']);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function validator($data, $rules, $message){
       return Validator::make($data, $rules, $message);
    }
}
