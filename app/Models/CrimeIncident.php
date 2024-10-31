<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrimeIncident extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika berbeda dari konvensi Laravel
    protected $table = 'crime_incident'; // Pastikan ini sesuai dengan nama tabel di database

    // Daftar atribut yang dapat diisi
    protected $fillable = [
        'regency',
        'years',
        'CT',
        'totalP21',
        'totalTahap2',
        'totalRJ',
        'totalSP3',
        'totalSP2LID',
    ];
}
