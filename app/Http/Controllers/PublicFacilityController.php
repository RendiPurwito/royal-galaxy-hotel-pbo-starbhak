<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublicFacility;
use Illuminate\Support\Facades\Storage;

class PublicFacilityController extends Controller
{
    public function index(){
        return view('admin.public-facility.index',[
            'public_facility' => PublicFacility::all(),
        ]);
    }

    public function create(){
        return view('admin.public-facility.create',[
            'public_facility' => PublicFacility::all(),
        ]);
    }

    public function store(Request $request){
        $validasi = $this->validate($request,[
            'facility_name' => ['required'],
            'description' => ['required']
        ]);
        PublicFacility::create($validasi);
        return redirect()->route('public-facility')->with('success','Data berhasil di Tambah!');
    }

    public function edit($id){
        return view('admin.public-facility.edit',[
            'public_facility' => PublicFacility::find($id),
        ]);
    }

    public function update(Request $request, $id){
        $validasi = $this->validate($request,[
            'facility_name' => ['required'],
            'description' => ['required']
        ]);

        PublicFacility::where('id',$id)->update($validasi);
        return redirect()->route('public-facility')->with('edit','Data berhasil di Ubah!');
    }

    public function destroy($id){
        $public_facility = PublicFacility::find($id);
        $public_facility->delete();

        return redirect()->route('public-facility')->with('delete','Data berhasil di Hapus!');
    }
}
