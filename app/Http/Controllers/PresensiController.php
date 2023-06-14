<?php

namespace App\Http\Controllers;

use App\Models\Ket;
use App\Models\User;
use App\Models\Kelas;
use App\Models\ListRole;
use App\Models\Presensi;
use App\Events\Presensia;
use App\Models\ListPresensi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    //
    public function listedit(Request $req)
    {
        $idp = $req->pres_id;
        $absen = ListPresensi::find($req->pres_id);
        $absen->ket_id = $req->ket;
        $absen->time = Carbon::now();
        $absen->save();
        $idp = $req->id_presensi;



        return back();
    }
    public function lihat_laporan($id)
    {
        $listklsguru =
            Kelas::with('listrole')->whereHas('listrole', function ($query) {
                $query->where('user_id', Auth::id())->where('role_id', '1');
            })->where('archive', '0')->get();
        $listklsmurid =
            Kelas::with('listrole')->whereHas('listrole', function ($query) {
                $query->where('user_id', Auth::id())->where('role_id', '2');
            })->where('archive', '0')->get();
        $guru = Presensi::find($id)->class->listrole->whereIn('role_id', ['1']);
        if (Auth::id() == $guru[0]->user_id) {
            $idp = $id;
            $data = ListPresensi::whereIn('presensi_id', [$idp])->orderByDesc('time')->get();
            $murid = new Collection();



            // $data1 = $d->where('murid', $angka);
            $data->each(function ($model) {
                $angka = $model->murid;
                $kete = $model->ket_id;
                $n = User::find($angka)->name;
                $f = User::find($angka)->url_photo;
                $e = User::find($angka)->email;
                $k = Ket::find($kete)->ket;
                $attributes = $model->getAttributes(); // Mendapatkan nilai atribut saat ini

                // Tambahkan data pada kolom attributes di sini
                $attributes['nama'] = $n;
                $attributes['foto'] = $f;
                $attributes['email'] = $e;
                $attributes['keterangan'] = $k;

                $model->setRawAttributes($attributes); // Mengatur nilai atribut baru
            });

            return view('data_laporan_presensi')->with([
                'data' => $data,
                'listklsguru' => $listklsguru,
                'listklsmurid' => $listklsmurid,
            ]);
        } else {
            return redirect('/');
        }
    }
    public function lihat_realtime(Request $req)
    {
        $listklsguru =
            Kelas::with('listrole')->whereHas('listrole', function ($query) {
                $query->where('user_id', Auth::id())->where('role_id', '1');
            })->where('archive', '0')->get();
        $listklsmurid =
            Kelas::with('listrole')->whereHas('listrole', function ($query) {
                $query->where('user_id', Auth::id())->where('role_id', '2');
            })->where('archive', '0')->get();
        $idp = $req->id_presensi;
        $data = ListPresensi::whereIn('presensi_id', [$idp])->orderByDesc('time')->get();
        $murid = new Collection();



        // $data1 = $d->where('murid', $angka);
        $data->each(function ($model) {
            $angka = $model->murid;
            $kete = $model->ket_id;
            $n = User::find($angka)->name;
            $f = User::find($angka)->url_photo;
            $e = User::find($angka)->email;
            $k = Ket::find($kete)->ket;
            $attributes = $model->getAttributes(); // Mendapatkan nilai atribut saat ini

            // Tambahkan data pada kolom attributes di sini
            $attributes['nama'] = $n;
            $attributes['foto'] = $f;
            $attributes['email'] = $e;
            $attributes['keterangan'] = $k;

            $model->setRawAttributes($attributes); // Mengatur nilai atribut baru
        });

        return view('laporan_presensi')->with([
            'listklsguru' => $listklsguru,
            'listklsmurid' => $listklsmurid,
            'data' => $data
        ]);
    }
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
        $keterangan = Ket::find($req->ket);

        $guru = Presensi::find($req->pres_id)->class->listrole->whereIn('role_id', ['1']);
        $idenguru = User::find($guru);
        // dd($idenguru[0]);

        $dataSend = [
            'nama' => Auth::user()->name,
            'ket' => $keterangan->ket,
            'waktu' => Carbon::now()->toDateTimeString(),
            'guru' => $guru[0]->user_id,
            'email' => Auth::user()->email,
            'foto' => Auth::user()->url_photo,
        ];
        event(new Presensia($dataSend));
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
