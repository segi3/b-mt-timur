<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsumsiEnergi extends Model
{
    use HasFactory;

    protected $fillable = [
        'konsumsi_air', 'konsumsi_air', 'konsumsi_gas',
        'tanggal', 'keterangan'
    ];
}
