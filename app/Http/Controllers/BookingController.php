<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $booking = Booking::all()->sortByDesc('created_at');
        $user = User::all();
        $room = Room::all();
        return view('booking.index',[
            'booking' => $booking,
            'user' => $user,
            'room' => $room
        ]);
    }

    public function create(){
        return view('booking.create',[
            'booking' => Booking::all(),
            'user' => User::all()->sortBy('name'),
            'room' => Room::all()->sortBy('room_type')
        ]);
    }

    public function store(Request $request){
        $validasi = $this->validate($request,[
            'user_id' => ['required'],
            'room_id' => ['required'],
            'check_in' => ['required'],
            'check_out' => ['required'],
            'total_pembayaran' => ['required'],
        ]);

        Booking::create($validasi);
        return redirect('/booking')->with('success','Data berhasil di tambah!');
    }

    public function edit($id){
        return view('booking.edit',[
            'booking' => Booking::find($id),
            'user' => User::all()->sortBy('name'),
            'room' => Room::all()->sortBy('room_type')
        ]);
    }

    public function update(Request $request,$id){
        $validasi = $this->validate($request,[
            'user_id' => ['required'],
            'room_id' => ['required'],
            'check_in' => ['required'],
            'check_out' => ['required'],
            'total_pembayaran' => ['required']
        ]);

        Booking::where('id',$id)->update($validasi);
        return redirect('/booking')->with('Edit','Data berhasil di ubah!');
    }

    public function destroy($id){
        $booking = Booking::find($id);
        $booking->delete();

        return redirect('/booking')->with('Delete','Data berhasil di hapus!');
    }
}
