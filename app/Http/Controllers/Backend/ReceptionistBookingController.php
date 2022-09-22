<?php

namespace App\Http\Controllers\Backend;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReceptionistBookingController extends Controller
{
    public function index(){
        $booking = Booking::all()->sortByDesc('created_at');
        $user = User::all();
        $room = Room::all();
        return view('receptionist.booking.index',[
            'booking' => $booking,
            'user' => $user,
            'room' => $room
        ]);
    }

    public function create(){
        $user = User::where('role','user')->orderBy('created_at','desc')->get();
        return view('receptionist.booking.create',[
            'booking' => Booking::all(),
            // 'user' => User::all()->sortBy('name'),
            'user' => $user,
            'room' => Room::all()->sortBy('room_type')
        ]);
    }

    public function store(Request $request){
        $validasi = $this->validate($request,[
            'user_id' => ['required'],
            'room_id' => ['required'],
            'check_in' => ['required'],
            'check_out' => ['required'],
            'total_payment' => ['required'],
            'qty' => ['required'],
        ]);

        Booking::create($validasi);
        return redirect('/receptionist/booking')->with('success','Data berhasil di tambah!');
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
            'total_payment' => ['required'],
            'qty' => ['required'],
        ]);

        Booking::where('id',$id)->update($validasi);
        return redirect('/receptionist/booking')->with('Edit','Data berhasil di ubah!');
    }

    public function destroy($id){
        $booking = Booking::find($id);
        $booking->delete();

        return redirect('/receptionist/booking')->with('Delete','Data berhasil di hapus!');
    }

    public function filter(Request $request){
        if (request()->dari || request()->sampai) {
            // $dari = explode('-', request('dari'));
            // $dari = $dari[0]. '-' . $dari[1] . '-' . intval($dari[2]) + 1;

            $sampai = explode('-', request('sampai'));
            $sampai = $sampai[0]. '-' . $sampai[1] . '-' . intval($sampai[2]);
            
            $booking = Booking::whereBetween('check_in',[request('dari'), $sampai])->whereBetween('check_out',[request('dari'), $sampai])->get();
            // $booking = Booking::whereBetween('check_in',request('dari'))->whereBetweer('check_out',$sampai)->get();
        } else {
            $booking = Booking::latest()->get();
        }

        return view('receptionist   .booking.index',[
            'booking' => $booking
        ]);
    }
}
