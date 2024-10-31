<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        return view('tentang_kami'); // Pastikan ada file 'tentang_kami.blade.php' di folder resources/views
    }
}
