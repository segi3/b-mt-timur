<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilitas extends Model
{
    use HasFactory;

    protected $table = 'utilitas';

    protected $fillable = [
        'no_util',
        'tanggal',
        'jenis_utilitas',
        'lokasi_utilitas',
        'status_utilitas',
        'bidang_utilitas',
        'keterangan'
    ];
}
