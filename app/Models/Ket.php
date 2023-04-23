<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ket extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'ket';

    public function listpresensi()
    {
        return $this->hasMany(ListPresensi::class, 'ket_id');
    }
}
