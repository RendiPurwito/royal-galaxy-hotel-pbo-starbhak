<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index(){
        $user = user::all()->sortBy('name');
        return view('admin.user.index',[
            'user' => $user
        ]);
    }

    public function create(){
        $user = user::all();
        return view('admin.user.create',[
            'user' => $user
        ]);
    }

    public function store(Request $request){

        $validatedData = $this->validate($request,[
            'name' => ['required'],
            'role' => ['required'],
            'username' => ['required'],
            'email' => ['required'],
            'password' => ['required']
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        return redirect()->route('user')->with('Success','Data berhasil Ditambahkan!');
    }

    public function edit($id){
        $user = User::find($id);

        return view('admin.user.edit',[
            'user' => $user
        ]);
    }

    public function update(Request $request,$id){
        $user = user::find($id);

        // $request['password'] = bcrypt($request['password']);
        $user->update($request->all());
        
        return redirect()->route('user')->with('Edit','User berhasil Diubah!');
    }
    
    public function destroy($id){
        $user = user::find($id);
        $user->delete();
        
        return redirect()->route('user');
    }
}
