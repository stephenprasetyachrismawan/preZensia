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

        $httpReferer = $req->headers->get('referer');
        if ($req->setiap == "minggu") {
            $mulai = Carbon::parse($req->mulai)->addDays(-7);
            $akhir = Carbon::parse($req->akhir)->addDays(-7);
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
        } else if ($req->setiap == "hari") {
            $mulai = Carbon::parse($req->mulai)->addDays(-1);
            $akhir = Carbon::parse($req->akhir)->addDays(-1);
            for ($i = 0; $i < $req->jumlah; $i++) {
                $presensi = new Presensi();
                $presensi->class_id = $req->idkelas;
                $mulai =
                    Carbon::parse($mulai)->addDays(1);
                $presensi->timestart =
                    $mulai;
                $akhir =
                    Carbon::parse($akhir)->addDays(1);
                $presensi->timeend =
                    $akhir;
                $presensi->save();
                $presensi = null;
            }
        } else if ($req->setiap == "bulan") {
            $mulai = Carbon::parse($req->mulai)->addMonths(-1);
            $akhir = Carbon::parse($req->akhir)->addMonths(-1);
            for ($i = 0; $i < $req->jumlah; $i++) {
                $presensi = new Presensi();
                $presensi->class_id = $req->idkelas;
                $mulai =
                    Carbon::parse($mulai)->addMonths(1);
                $presensi->timestart =
                    $mulai;
                $akhir =
                    Carbon::parse($akhir)->addMonths(1);
                $presensi->timeend =
                    $akhir;
                $presensi->save();
                $presensi = null;
            }
        }
        return redirect($httpReferer);
    }
}
