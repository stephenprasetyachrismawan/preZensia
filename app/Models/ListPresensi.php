<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPresensi extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'listpresensi';

    public function presensi()
    {
        $this->belongsTo(Presensi::class, 'presensi_id');
    }

    public function ket()
    {
        $this->belongsTo(Ket::class, 'ket_id');
    }
}
