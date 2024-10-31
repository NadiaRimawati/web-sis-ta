<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class footerController extends Controller
{
    public function index()
    {
        return view('footer'); // Pastikan ada file beranda.blade.php di folder resources/views
    }
}
