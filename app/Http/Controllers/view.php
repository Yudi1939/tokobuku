<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class view extends Controller
{
    function daftaruser(){
        return view('admin.daftaruser');
    }
}
