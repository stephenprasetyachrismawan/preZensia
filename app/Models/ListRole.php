<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListRole extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'listrole';

    public function kelas()
    {
        $this->belongsTo(Kelas::class, 'class_id');
    }

    public function user()
    {
        $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function roles()
    {
        $this->belongsTo(Roles::class, 'role_id');
    }
}
