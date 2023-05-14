<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PresensiController extends Controller
{
    //
    public function store(Request $req)
    {
        $mulai = Carbon::parse($req->mulai)->addDays(-7);
        $akhir = Carbon::parse($req->akhir)->addDays(-7);

        if ($req->setiap == "minggu") {
            for ($i = 0; $i < $req->jumlah; $i++) {
                $presensi = new Presensi();
                $presensi->class_id = $req->idkelas;
                $mulai =
                    Carbon::parse($mulai)->addDays(7);
                $presensi->timestart =
                    $mulai;
                $akhir =
                    Carbon::parse($akhir)->addDays(7);
                $presensi->timeend =
                    $akhir;
                $presensi->save();
                $presensi = null;
            }
        }
    }
}
