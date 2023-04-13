<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'presensi';

    public function class()
    {
        return $this->belongsTo(Kelas::class, 'class_id');
    }

    public function listpresensi()
    {
        return $this->hasMany(ListPresensi::class, 'presensi_id');
    }
}
