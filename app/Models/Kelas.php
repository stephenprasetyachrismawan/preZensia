<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Kelas extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'class';

    protected $fillable = ['class_name', 'class_code', 'hashcode', 'class_subject', 'class_desc'];

    public function listrole()
    {
        return $this->hasMany(ListRole::class, 'class_id', 'class_id');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'class_id');
    }

    protected static function booted()
    {
        static::created(function () {
            $kls = Kelas::orderByDesc('id')->first();
            $role = Roles::where('role', 'teacher')->first();
            $baru = [
                'class_id' => $kls->id,
                'role_id' => $role->id,
                'user_id' => Auth::id()
            ];
            ListRole::insert($baru);
        });
    }

    protected static function getCode()
    {
        $kode = '';
        do {
            $kode = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 6)), 0, 6);
            $cek = Kelas::where('class_code', $kode)->count();
        } while ($cek);
        return $kode;
    }

    protected static function strToNum($str)
    {
        $numeric_code = '';
  
        for ($i = 0; $i < strlen($str); $i++) {
            $char_code = sprintf('%03d', ord($str[$i]));
            $numeric_code .= strlen($char_code) === 2 ? '0'.$char_code : $char_code;
        }
        
        return $numeric_code;
    }

    protected static function numToStr($num){
        $string = '';
  
        for ($i = 0; $i < strlen($num); $i += 3) {
            $char_code = substr($num, $i, 3);
            $string .= chr($char_code);
        }
        
        return $string;
    }

    protected static function cekJoin($kode, $id)
    {
        $cek = Kelas::where('class_code', $kode)->count();
        if (!$cek) return 'noclass';
        $class = Kelas::where('class_code', $kode)->value('id');
        $cek2 = Listrole::where('class_id', $class)->where('user_id', $id)->count();
        if ($cek2) return 'ajoin';
        return $kode;
    }
}
