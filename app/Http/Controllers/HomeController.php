<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('beranda'); // Pastikan ada file beranda.blade.php di folder resources/views
    }

    public function peta() 
    {
        return view('peta');
    }
}
