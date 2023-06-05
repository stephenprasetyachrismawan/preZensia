<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\ListPresensi;

class AjaxController extends Controller
{
    public function chartReq(Request $request){
        $pres = Presensi::where('class_id', $request->cls_id)->get();
        $data = [];
        $count = count($pres);
        for($i=0; $i<$count; $i++){
            $pr = $pres[$i];
            $data['tgl'.($i+1)] = $pr->tanggal;
            $ls = ListPresensi::where('presensi_id', $pr->id)
                ->whereRaw("CAST(time AS TIME) <= ?", [$pr->timeend])->get();
            $data['cnt'.($i+1)] = $ls->count();
        }
        $data['count'] = $count;
        return response()->json($data);
    }
}
