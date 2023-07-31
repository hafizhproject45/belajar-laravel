<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class KelasController extends Controller
{
    public function kelas(){
        $data['kelas'] = DB::table('t_kelas')
        // ->orderBy('lokasi_ruangan')
        // ->where('nama_wali_kelas', 'like', '%a%')
        // ->where('jurusan', 'like', 'RPL')
        ->get();
        return view('kelas', $data);
    }
    public function createKelas()
    {
        return view('siswa/formKelas');
    }
    public function storeKelas(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_kelas' => 'required|unique:t_kelas',
            'jurusan' => 'required',
            'lokasi_ruangan' => 'required|unique:t_kelas',
            'nama_wali_kelas' => 'required'
        ]);
        
        $input = $request->all();
        unset($input['_token']);
        $status = DB::table('t_kelas')->insert($input);
        
        if ($status) {
            return redirect('/kelas')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('/kelas')->with('error', 'Data gagal ditambahkan');
        }
    }
}