<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_util', 'jadwal_maintenance',
        'uraian_pekerjaan', 'status_pekerjaan',
        'keterangan', 'utilitas_id'
    ];
}
