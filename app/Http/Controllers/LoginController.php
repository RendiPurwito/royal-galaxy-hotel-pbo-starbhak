<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function indexLogin(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->with('loginError','Login Failed!');
    }

    public function logout(Request $request){
        auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function indexRegister(){
        return view('auth.register');
    }

    public function storeRegister(Request $request){

        $validatedData = $this->validate($request,[
            'name' => ['required'],
            'role' => ['required'],
            'username' => ['required'],
            'email' => ['required'],
            'password' => ['required']
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        return redirect()->route('login')->with('Success','Anda Berhasil Registrasi !');
    }
}
