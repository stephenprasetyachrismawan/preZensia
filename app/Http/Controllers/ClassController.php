<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\ListPresensi;
use App\Models\Roles;
use App\Models\ListRole;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\IsEmpty;
use App\Http\Controllers\PresensiController;

use function PHPUnit\Framework\isEmpty;

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
        if($kls->isEmpty() || $kls[0]->archive==1){
            return redirect()->route('classes');
        }
        $idk = $kls[0]->id;
        $role = ListRole::where('class_id', Kelas::where('hashcode', $id)->value('id'))->where('user_id', Auth::id())->value('role_id');

        $part = ListRole::where('class_id', Kelas::where('hashcode', $id)->value('id'))->get();

        if ($kls && $role == 1) {
            $list = Presensi::where('class_id', $idk)->get()->sortDesc();
            $idp = [];
            foreach ($list as $li) {
                $idp[] = $li->id;
            }
            $stat = ListPresensi::whereIn('presensi_id', $idp)->where('murid', Auth::id())->get();
            return view('kelas.home')->with([
                'idk' => $idk,
                'part' => $part,
                'list' => $list,
                'status' => $stat
            ]);
        } else if ($kls && $role == 2) {
            $list = Presensi::where('class_id', $idk)->get();

            $idp = [];
            foreach ($list as $li) {
                $idp[] = $li->id;
            }

            $stat = ListPresensi::whereIn('presensi_id', $idp)->where('murid', Auth::id())->get();
            foreach ($list as $li) {
                $li->status_presensi = 0;
                foreach ($stat as $st) {
                    if ($li->id == $st->presensi_id) {
                        $li->status_presensi = 1;
                    }
                }
            }
            return view('kelas.home2')->with([
                'list' => $list,
                'part' => $part,
                'status' => $stat
            ]);
        }
        return redirect()->route('classes');
    }
    public function linkjoin($id, $kode)
    {
        if(Kelas::where('class_code', $kode)->value('archive')==1){
            redirect()->route('classes');
        }
        $kls = Kelas::with('listrole')->whereIn('hashcode', [$id])->whereHas('listrole', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();
        if ($kls->isEmpty()) {
            $clid = Kelas::where('class_code', $kode)->value('id');
            $rid = Roles::where('role', 'student')->value('id');
            $uid = Auth::id();
            $data = [
                'class_id' => $clid,
                'role_id' => $rid,
                'user_id' => $uid
            ];
            $join = ListRole::create($data);
            return redirect()->route('classes.home', $id);
        }
        $idk = $kls[0]->id;
        $role = ListRole::where('user_id', Auth::id())->value('role_id');
        if ($kls && $role == 1)
            return redirect()->route('classes.home', $id);
        else if ($kls && $role == 2) {
            return redirect()->route('classes.home', $id);
        }
    }
    // getkelas is for dashboard classes / home
    public function getkelas()
    {
        $list = ListRole::whereIn('user_id', [Auth::user()->id])->get();
        $kelas = [];
        $data = [];
        foreach ($list as $li) {

            $kelas[] = Kelas::whereIn('id', [$li->class_id])->where('archive', 0)->get();
        }
        // $kelas = Kelas::whereIn('class_id', [$list[0]->class_id])->get();


        $nama_kelas = [];
        $guru = [];
        $hashcode = [];
        //dd($kelas);
        if(empty($kelas)){
            return view('class', compact('data'));
        }
        foreach ($kelas as $ke) {
            if($ke->isEmpty()){
                continue;
            }
            $nama_kelas[] = $ke[0]->class_name;
            $listguru = ListRole::with('user')->whereIn('role_id', ['1'])->whereIn('class_id', [$ke[0]->id])->get();
            $guru0 = User::find($listguru[0]->user_id);
            $guru[] = $guru0->name;
            $hashcode[] = $ke[0]->hashcode;
        }
        $rolekelas = [];
        foreach ($list as $li) {
            if($li->kelas->archive == 1){
                continue;
            }
            $rolekelas[] = $li->role_id;
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
        if(Kelas::where('class_code', $kode)->value('archive')){
            return redirect()->route('classes');
        }
        $hash = Kelas::where('class_code', $kode)->value('hashcode');
        $cek = Kelas::cekJoin($kode, Auth::id());
        if ($cek == 'noclass')
            return redirect()->route('classes.join');
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

    public function archive(Request $request){
        $hashcode = $request->id;
        $cek = Kelas::where('hashcode', $hashcode)->update(['archive'=>1]);
        if($cek) $data['msg'] = 'success';
        return response()->json($data);
    }

    public function unarchive(Request $request){
        $hashcode = $request->id;
        $cek = Kelas::where('hashcode', $hashcode)->update(['archive'=>0]);
        if($cek) $data['msg'] = 'success';
        return response()->json($data);
    }

    public function get_archive(){
        $list = ListRole::whereIn('user_id', [Auth::user()->id])->get();
        $kelas = [];
        $data = [];
        foreach ($list as $li) {
            $kelas[] = Kelas::whereIn('id', [$li->class_id])->where('archive', 1)->get();
        }
        // $kelas = Kelas::whereIn('class_id', [$list[0]->class_id])->get();
        $nama_kelas = [];
        $guru = [];
        $hashcode = [];
        if(empty($kelas)){
            return view('archive', compact('data'));
        }
        foreach ($kelas as $ke) {
            if($ke->isEmpty()){
                continue;
            }
            $nama_kelas[] = $ke[0]->class_name;
            $listguru = ListRole::with('user')->whereIn('role_id', ['1'])->whereIn('class_id', [$ke[0]->id])->get();
            $guru0 = User::find($listguru[0]->user_id)->get();
            $guru[] = $guru0[0]->name;
            $hashcode[] = $ke[0]->hashcode;
        }
        // 
        $rolekelas = [];
        foreach ($list as $li) {
            $rolekelas[] = $li->role_id;
        }

        // dd($userkelas);
        $data = [];
        for ($i = 0; $i < count($nama_kelas); $i++) {
            $data[] = [$nama_kelas[$i], $rolekelas[$i], $guru[$i], $hashcode[$i]];
        }
        return view('archive', compact('data'));
    }

    public function unenroll(Request $request){
        $id = $request->id;
        $kelas = $request->kelas;
        $cek = ListRole::where('user_id', $id)->where('class_id', $kelas)->delete();
        if($cek) $data['msg'] = 'success';
        return response()->json($data);
    }
}
