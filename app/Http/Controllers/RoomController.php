<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomFacility;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
        return view('admin.room.index',[
            'room' => Room::all(),
            'room_facility' => RoomFacility::all()
        ]);
    }

    public function create(){
        return view('admin.room.create',[
            'room' => Room::all(),
            'room_facility' => RoomFacility::all()
        ]);
    }

    public function store(Request $request){
        $validasi = $this->validate($request,[
            'room_type' => ['required'],
            'room_facility_id' => ['required'],
            'price' => ['required'],
        ]);
        Room::create($validasi);
        return redirect()->route('room')->with('success','Data berhasil di Tambah!');
    }

    public function edit($id){
        return view('admin.room.edit',[
            'room' => Room::find($id),
            'room_facility' => RoomFacility::all()
        ]);
    }

    public function update(Request $request, $id){
        $validasi = $this->validate($request,[
            'room_type' => ['required'],
            'room_facility_id' => ['required'],
            'price' => ['required'],
        ]);
        Room::where('id',$id)->update($validasi);
        return redirect()->route('room')->with('edit','Data berhasil di Ubah!');
    }

    public function destroy($id){
        $room = Room::find($id);
        $room->delete();
        return redirect()->route('room')->with('delete','Data berhasil di Hapus!');
    }
}
