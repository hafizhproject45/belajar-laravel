<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class SiswaController extends Controller
{
    public function index()
    {
        // $data['siswa'] = DB::table('t_siswa')
        //     ->orderBy('jenkel')
        //     ->where('nama_lengkap', 'like', '%o%')
        //     ->get();
        // return view('siswa', $data);
        $data['siswa'] = Siswa::orderBy('nama_lengkap')->get();
        return view('siswa', $data);
    }
    public function createSiswa()
    {
        return view('form/formSiswa');
    }
    public function storeSiswa(Request $request): RedirectResponse
    {
        $request->validate([
            'nis' => 'required|numeric|unique:t_siswa',
            'nama_lengkap' => 'required|string',
            'jenkel' => 'required',
            'goldar' => 'required'
        ]);

        $input = $request->all();
        // $status = \App\Models\Siswa::create($input);
        // unset($input['_token']);
        // $status = DB::table('t_siswa')->insert($input);
        
        $siswa = new Siswa;
        $siswa->nis = $input['nis'];
        $siswa->nama_lengkap = $input['nama_lengkap'];
        $siswa->jenkel = $input['jenkel'];
        $siswa->goldar = $input['goldar'];
        $status = $siswa->save();

        if ($status) {
            return redirect('/siswa')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('/siswa')->with('error', 'Data gagal ditambahkan');
        }
    }
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nis' => 'required|numeric',
            'nama_lengkap' => 'required|string',
            'jenkel' => 'required',
            'goldar' => 'required'
        ]);
        $input = $request->all();
        $siswa = Siswa::find($id);
        // $status = $siswa->update($input);
        // unset($input['_token']);
        // unset($input['_method']);
        // $status = DB::table('t_siswa')->where('id', $id)->update($input);
        
        $siswa->nis = $input['nis'];
        $siswa->nama_lengkap = $input['nama_lengkap'];
        $siswa->jenkel = $input['jenkel'];
        $siswa->goldar = $input['goldar'];
        $status = $siswa->update();

        if ($status) {
            return redirect('/siswa')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect('/siswa')->with('error', 'Data gagal diupdate');
        }
    }
    public function edit($id){
        $data['siswa'] = DB::table('t_siswa')->find($id);
        return view('form/formSiswa', $data);
    }
    public function destroy($id){
        $siswa = Siswa::find($id);
        $status = $siswa->delete();
        // $status = DB::table('t_siswa')->where('id', $id)->delete();
        
        if ($status) {
            return redirect('/siswa')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/siswa')->with('error', 'Data gagal dihapus');
        }
    }

    // public function biodata()
    // {
    //     return view('biodata');
    // }
    // public function lorem()
    // {
    //     return view('lorem');
    // }
    // public function nama()
    // {
    //     return view('nama');
    // }
}