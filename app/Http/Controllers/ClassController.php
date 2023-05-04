<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\ListRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {

        return view('kelas.home', ['id' => $id]);
    }
    // getkelas is for dashboard classes / home
    public function getkelas()
    {
        $list = ListRole::with('user')->whereIn('user_id', [Auth::user()->id])->get();
        $kelas = [];
        foreach ($list as $li) {
            $kelas[] = Kelas::whereIn('class_id', [$li->class_id])->get();
        }
        // $kelas = Kelas::whereIn('class_id', [$list[0]->class_id])->get();


        $nama_kelas = [];
        $guru = [];
        foreach ($kelas as $ke) {
            $nama_kelas[] = $ke[0]->class_name;
            $listguru = ListRole::with('user')->whereIn('role_id', ['1'])->whereIn('class_id', [$ke[0]->class_id])->get();
            $guru0 = User::find($listguru[0]->user_id)->get();
            $guru[] = $guru0[0]->name;
        }
        // 
        $rolekelas = [];
        foreach ($list as $li) {
            $rolekelas[] = $li->role_id;
        }


        // dd($userkelas);
        $data = [];
        for ($i = 0; $i < count($nama_kelas); $i++) {
            $data[] = [$nama_kelas[$i], $rolekelas[$i], $guru[$i]];
        }

        return view('class', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'class_name' => $request->namaKelas,
            'class_code' => Kelas::getCode(),
            'class_subject' => $request->namaSubject,
            'class_desc' => $request->descKelas
        ];

        $kls = Kelas::create($data);

        return redirect()->route('classes');
    }

    public function join()
    {
        return view('kelas.join');
    }

    public function check(Request $request)
    {
        $kode = $request->kodeKelas;
        $cek = Kelas::cekJoin($kode, Auth::id());

        if ($cek == 'ajoin') return redirect()->route('classes.home', $kode);
        else if ($cek == 'noclass') return;
        else if ($cek) {
            $data = [];
            $join = ListRole::create($data);
            return redirect()->route('classes.home' . $cek);
        }
    }
}
