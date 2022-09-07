<?php

namespace App\Http\Controllers;

use App\Models\RoomFacility;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomFacilityController extends Controller
{
    public function index(){
        return view('admin.room-facility.index',[
            'room_facility' => RoomFacility::all()->sortByDesc('created_at')
        ]);
    }

    public function create(){
        return view('admin.room-facility.create',[
            'room_facility' => RoomFacility::all(),
        ]);
    }

    public function store(Request $request){
        $validasi = $this->validate($request,[
            'facility_name' => ['required']
        ]);
        RoomFacility::create($validasi);
        return redirect()->route('room-facility')->with('success','Data berhasil di Tambahkan!');
    }

    public function edit($id){
        return view('admin.room-facility.edit',[
            'room_facility' => RoomFacility::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $validasi = $this->validate($request,[
            'facility_name' => ['required']
        ]);
        RoomFacility::where('id',$id)->update($validasi);
        return redirect()->route('room-facility')->with('edit','Data berhasil di Ubah!');
    }

    public function destroy($id){
        $room_facility = RoomFacility::find($id);
        $room_facility->delete($room_facility);

        return redirect()->route('room-facility')->with('delete','Data berhasil di Hapus!');
    }
}