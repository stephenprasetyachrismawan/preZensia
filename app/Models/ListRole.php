<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListRole extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'listrole';

    protected $fillable = ['class_id', 'role_id', 'user_id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'class_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function roles()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }
}
