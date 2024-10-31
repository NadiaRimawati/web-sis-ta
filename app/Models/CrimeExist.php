<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrimeExist extends Model
{
    use HasFactory;

    protected $table = "crime_exist";

    protected $fillable = [
        "pencurian",
        "penipuan",
        "penggelapan",
        "perjudian",
        "pemerkosaan",
        "pembakaran",
        "pemerasan",
        "pembunuhan",
        "regency",
        "years"
    ];
}
