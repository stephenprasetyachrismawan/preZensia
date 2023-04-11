<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
}
