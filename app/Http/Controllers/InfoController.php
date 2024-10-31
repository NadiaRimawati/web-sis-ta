<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        return view('informasi'); // Pastikan ada file beranda.blade.php di folder resources/views
    }
}
