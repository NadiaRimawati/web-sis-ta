<?php

// Contoh controller
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class unggahController extends Controller
{
    public function index()
    {
        return view("unggah");
    }
}

