<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function kelas(){
        $data['kelas'] = DB::table('t_kelas')
        ->orderBy('lokasi_ruangan')
        ->where('nama_wali_kelas', 'like', '%a%')
        ->where('jurusan', 'like', 'RPL')
        ->get();
        return view('kelas', $data);
    }
}