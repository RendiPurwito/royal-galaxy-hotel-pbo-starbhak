<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\PublicFacility;
use App\Models\Room;
use App\Models\RoomFacility;

class DashboardController extends Controller
{
    public function indexAdmin(){
        return view('admin.dashboard',[
            'rooms' => Room::count(),
            'rooms_facilities' => RoomFacility::count(),
            'facilities' => PublicFacility::count(),
            'booking' => Booking::count(),
        ]);
    }

    public function indexReceptionist(){
        return view('receptionist.dashboard',[
            'booking' => Booking::count()
        ]);
    }
}
