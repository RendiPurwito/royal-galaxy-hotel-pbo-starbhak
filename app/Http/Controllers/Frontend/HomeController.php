<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use App\Models\RoomFacility;
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

 

    function GenerateCode()
    {

        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersNumber = strlen($characters);
        $codeLength = 6;

        $code = '';

        while (strlen($code) < 6) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code.$character;
        }

        if (Booking::where('booking_code', $code)->exists()) {
            $this->GenerateCode();
        }

        return $code;
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
        $validasi['booking_code'] = $this->GenerateCode();

        Booking::create($validasi);
        return redirect('/invoice')->with('success','Data berhasil di tambah!');
    }

    public function invoice(){
        $booking = Booking::where('user_id',auth()->user()->id)->get();
        $user = User::all();
        $room = Room::all();
        $room_facility = RoomFacility::all();
        return view('page.home.invoice',[
            'booking' => $booking,
            'user' => $user,
            'room' => $room,
            'room_facility' => $room_facility
        ]);
    }

    public function print(){
        $booking = Booking::all();
        $user = User::all();
        $room = Room::all();
        $room_facility = RoomFacility::all();
        return view('page.home.invoice-print',[
            'booking' => $booking,
            'user' => $user,
            'room' => $room,
            'room_facility' => $room_facility
        ]);
    }

    
}
