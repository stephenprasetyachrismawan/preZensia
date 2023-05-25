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
        $jammulai = $req->jammulai;
        $jamakhir = $req->jamakhir;
if($req->ulangi){
    if ($req->setiap == "minggu") {
        $mulai = Carbon::parse($req->mulai)->addDays(-7);
        
        for ($i = 0; $i < $req->jumlah; $i++) {
            $presensi = new Presensi();
            $presensi->class_id = $req->idkelas;
            $mulai =
                Carbon::parse($mulai)->addDays(7);
            $presensi->tanggal =
                $mulai;

            $presensi->timestart = $jammulai;
            $presensi->timeend =
                $jamakhir;
            $presensi->save();
            $presensi = null;
        }
    } else if ($req->setiap == "hari") {
        $mulai = Carbon::parse($req->mulai)->addDays(-1);
        
        for ($i = 0; $i < $req->jumlah; $i++) {
            $presensi = new Presensi();
            $presensi->class_id = $req->idkelas;
            $mulai =
                Carbon::parse($mulai)->addDays(1);
            $presensi->tanggal =
                $mulai;

            $presensi->timestart = $jammulai;
            $presensi->timeend =
                $jamakhir;
            $presensi->save();
            $presensi = null;
        }
    } else if ($req->setiap == "bulan") {
        $mulai = Carbon::parse($req->mulai)->addMonths(-1);
        
        for ($i = 0; $i < $req->jumlah; $i++) {
            $presensi = new Presensi();
            $presensi->class_id = $req->idkelas;
            $mulai =
                Carbon::parse($mulai)->addMonths(1);
            $presensi->tanggal =
                $mulai;

            $presensi->timestart = $jammulai;
            $presensi->timeend =
                $jamakhir;
            $presensi->save();
            $presensi = null;
        }
    }
}else{
    $mulai = Carbon::parse($req->mulai)->addDays(-1);
    $presensi = new Presensi();
    $presensi->class_id = $req->idkelas;
    $mulai =
        Carbon::parse($mulai)->addDays(1);
    $presensi->tanggal =
        $mulai;

    $presensi->timestart = $jammulai;
    $presensi->timeend =
        $jamakhir;
    $presensi->save();
    $presensi = null;

}
        
        return redirect($httpReferer);
    }
}
