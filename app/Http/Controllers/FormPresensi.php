<?php

namespace App\Http\Controllers;

use App\Events\Presensi;
use App\Events\Presensia;
use Illuminate\Http\Request;

class FormPresensi extends Controller
{
    public function simpan(Request $req)
    {


        $dataSend = [
            'nama' => "Stephen",
            'ket' => "Hadir",
            'waktu' => now(),
        ];

        event(new Presensia($dataSend));
        return redirect('isi-presensi');
    }
}
