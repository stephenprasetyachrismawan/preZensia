<?php

namespace App\Http\Controllers;

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

        if($cek == 'ajoin') return redirect()->route('classes.home', $kode);
        else if($cek == 'noclass') return;
        else if($cek){
            $data = [

            ];
            $join = ListRole::create($data);
            return redirect()->route('classes.home'.$cek);
        } 
    }
}
