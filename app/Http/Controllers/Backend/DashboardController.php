<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function indexAdmin(){
        return view('admin.dashboard');
    }

    public function indexReceptionist(){
        return view('receptionist.dashboard');
    }
}
