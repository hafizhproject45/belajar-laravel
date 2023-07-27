<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index(){
        $data['siswa'] = DB::table('t_siswa')
        // ->orderBy('jenkel')
        // ->where('nama_lengkap', 'like', '%o%')
        ->get();
        return view('siswa', $data);
    }

    public function biodata(){
        return view('biodata');
    }
    public function lorem(){
        return view('lorem');
    }
    public function nama(){
        return view('nama');
    }
}