<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komplain extends Model
{
    use HasFactory;

    protected $table = 'komplain';

    protected $fillable = [
        'tgl_penyampaian',
        'bidang_pekerjaan',
        'uraian_pekerjaan',
        'status_pekerjaan',
        'nama_pelapor',
        'user_id',
        'nama_teknisi'
    ];
}
