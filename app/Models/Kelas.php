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

    protected $fillable = ['class_name', 'class_code', 'class_subject', 'class_desc'];

    public function listrole()
    {
        $this->hasMany(ListRole::class, 'class_id');
    }

    public function presensi()
    {
        $this->hasMany(Presensi::class, 'class_id');
    }

    protected static function booted()
    {   
        static::created(function (){
            $kls = DB::table('class')->orderByDesc('class_id')->first();
            $role = DB::table('roles')->where('role', 'teacher')->first();
            $baru = [
                'class_id' => $kls->class_id,
                'role_id' => $role->role_id,
                'user_id' => Auth::id()
            ];
            DB::table('listrole')->insert($baru);
        });
    }

    protected static function getCode()
    {
        $kode = '';
        do{
            $kode = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 6)), 0, 6);
            $cek = DB::table('class')->where('class_code', $kode)->count();
        }while($cek);
        return $kode;
    }

    protected static function cekJoin($kode, $id)
    {
        $cek = DB::table('class')->where('class_code', $kode)->count();
        if(!$cek) return 'noclass';
        $class = DB::table('class')->where('class_code', $kode)->value('class_id');
        $cek2 = DB::table('listrole')->where('class_id', $class)->where('user_id', $id)->count();
        if($cek2) return 'ajoin';
        return $kode;
    }
}
