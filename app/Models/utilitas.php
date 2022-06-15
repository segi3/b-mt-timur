<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilitas extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_util',
        'tanggal',
        'jenis_utlitas',
        'lokasi_utlitas',
        'status_utilitas',
        'keterangan'
    ];
}
