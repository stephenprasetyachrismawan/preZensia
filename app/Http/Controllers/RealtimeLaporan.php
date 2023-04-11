<?php

namespace App\Http\Controllers;

use App\Events\Presensi;
use Illuminate\Http\Request;

class RealtimeLaporan extends Controller
{
    //
    public function tesnotif()
    {
        event(new Presensi('Latihan Presensi'));
    }
}
