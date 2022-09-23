<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $user = User::all();
        $room = Room::all();
        return view('page.home.index',[
            'user' => $user,
            'room' => $room
        ]);
    }

    

    public function store(Request $request){
        $validasi = $this->validate($request,[
            'user_id' => ['required'],
            'room_id' => ['required'],
            'check_in' => ['required'],
            'check_out' => ['required'],
            'qty' => ['required'],
        ]);

        $room = Room::where('id',$request->room_id)->first();

        $validasi['total_payment'] = $request->qty * $room->price;

        Booking::create($validasi);
        return redirect('/')->with('success','Data berhasil di tambah!');
    }
}
