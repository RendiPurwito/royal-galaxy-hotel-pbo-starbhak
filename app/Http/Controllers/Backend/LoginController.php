<?php

namespace App\Http\Controllers\Backend;

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
    
            if(auth()->user()->role == 'admin'){
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard');

            }else if(auth()->user()->role == 'receptionist'){
                $request->session()->regenerate();
                return redirect()->intended('/receptionist/dashboard');

            }else{
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
        }

        return back()->with('loginError','Login Failed!');
    }

    public function logout(Request $request){
        auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
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
