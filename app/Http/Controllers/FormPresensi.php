<?php

namespace App\Http\Controllers;

use App\Events\Presensi;
use Illuminate\Http\Request;

class FormPresensi extends Controller
{
    public function simpan(Request $req)
    {

        $presensi_id = 
        $dataSend = [
            'nama' => "Stephen",
            'ket' => "Hadir",
            'waktu' => now(),
        ];

        event(new Presensi($dataSend));
        return redirect('isi-presensi');
    }
}
