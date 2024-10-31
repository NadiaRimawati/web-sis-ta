<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Kolom yang bisa diisi
    protected $fillable = [
        'nip',
        'password',
        // kolom lain yang diperlukan
    ];

    // Jika Anda menggunakan hashing, pastikan password di-hash saat disimpan
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // Tambahkan kolom lain yang diperlukan di sini
}
