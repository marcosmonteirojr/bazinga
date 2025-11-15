<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function show(){
        return view('auth.register');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);
        User::create([
            'name'=>$request->nome,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=> 'user',
        ]);
        return redirect('/login')->with('success','Cadastro realizado');
    }
}
