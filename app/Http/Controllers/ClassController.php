<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\ListRole;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $kls = Kelas::with('listrole')->whereIn('hashcode', [$id])->whereHas('listrole', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();
        if ($kls) return view('kelas.home');
        return redirect()->route('classes');
    }
    // getkelas is for dashboard classes / home
    public function getkelas()
    {
        $list = ListRole::whereIn('user_id', [Auth::user()->id])->get();
        $kelas = [];
        foreach ($list as $li) {

            $kelas[] = Kelas::whereIn('id', [$li->class_id])->get();
        }
        // $kelas = Kelas::whereIn('class_id', [$list[0]->class_id])->get();


        $nama_kelas = [];
        $guru = [];
        $hashcode = [];
        foreach ($kelas as $ke) {

            $nama_kelas[] = $ke[0]->class_name;
            $listguru = ListRole::with('user')->whereIn('id', ['1'])->whereIn('class_id', [$ke[0]->id])->get();
            $guru0 = User::find($listguru[0]->user_id)->get();
            $guru[] = $guru0[0]->name;
            $hashcode[] = $ke[0]->hashcode;
        }
        // 
        $rolekelas = [];
        foreach ($list as $li) {
            $rolekelas[] = $li->id;
        }

        // dd($userkelas);
        $data = [];
        for ($i = 0; $i < count($nama_kelas); $i++) {
            $data[] = [$nama_kelas[$i], $rolekelas[$i], $guru[$i], $hashcode[$i]];
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
        $kode = Kelas::getCode();
        $data = [
            'class_name' => $request->namaKelas,
            'hashcode' => base64_encode(Kelas::strToNum($kode)),
            'class_code' => $kode,
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
        $hash = Kelas::where('class_code', $kode)->value('hashcode');
        $cek = Kelas::cekJoin($kode, Auth::id());

        if ($cek == 'noclass') return redirect()->route('classes.join');
        else if ($cek == 'ajoin') {
            return redirect()->route('classes.home', $hash);
        } else if ($cek) {
            $clid = Kelas::where('class_code', $kode)->value('id');
            $rid = Roles::where('role', 'student')->value('id');
            $uid = Auth::id();
            $data = [
                'class_id' => $clid,
                'role_id' => $rid,
                'user_id' => $uid
            ];
            $join = ListRole::create($data);
            return redirect()->route('classes.home', $hash);
        }
    }
}
