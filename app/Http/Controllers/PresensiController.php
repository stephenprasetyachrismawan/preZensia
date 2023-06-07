<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ListPresensi;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    //
    public function delete(Request $req)
    {
        $cek = Presensi::find($req->id)->delete();
        if ($cek) $data['msg'] = 'success';
        return response()->json($data);
    }
    public function update(Request $req)
    {

        $baru = Presensi::find($req->id_pres);
        $baru->tanggal = $req->tanggal;
        $baru->timestart = $req->start;
        $baru->timeend = $req->end;
        $baru->ket = $req->ket;
        $baru->save();
        return back();
    }
    public function simpan(Request $req)
    {
        $absen = new ListPresensi;
        $absen->presensi_id = $req->pres_id;
        $absen->ket_id = $req->ket;
        $absen->murid = Auth::id();
        $absen->time = Carbon::now();
        $absen->save();
        return back();
    }
    public function lihat_presensi($idk, $role)
    {
        if ($role == 1) {
            return $idk;
        } else if ($role == 2) {
            $list = Presensi::where('class_id', $idk)->get();
            $idp = [];
            foreach ($list as $li) {
                $idp[] = $li->id;
            }
            $stat = ListPresensi::whereIn('presensi_id', $idp)->where('murid', Auth::id())->get();

            return [$list, $stat];
        }
    }

    public function store(Request $req)
    {

        $httpReferer = $req->headers->get('referer');
        $jammulai = $req->jammulai;
        $jamakhir = $req->jamakhir;
        $ket = $req->ket;
        if ($req->ulangi) {
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
                    $presensi->ket = $ket;
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
                    $presensi->ket = $ket;
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
                    $presensi->ket = $ket;
                    $presensi->save();
                    $presensi = null;
                }
            }
        } else {
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
            $presensi->ket = $ket;
            $presensi->save();
            $presensi = null;
        }

        return redirect($httpReferer);
    }
}
