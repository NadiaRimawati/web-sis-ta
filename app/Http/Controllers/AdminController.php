<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function ct()
    {
        return view('ct');
    }

    // Method untuk menangani login
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->validate([
                "nip" => ["required","string"],
                "password"=> ["required", "string"],
            ]);

            if (Auth::attempt($credentials)) {
                return redirect()->intended('kriminalitas');
            }

            return redirect()->back()->withErrors([
                'login' => 'NIP atau kata sandi salah.',
            ])->withInput(); 
        }

        return view('admin'); // tampilkan form login
    }
}
