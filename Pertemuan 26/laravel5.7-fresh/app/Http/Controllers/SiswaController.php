<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class SiswaController extends Controller
{
    public function siswa()
    {
        $data['siswa'] = DB::table('t_siswa')
            // ->orderBy('jenkel')
            // ->where('nama_lengkap', 'like', '%o%')
            ->get();
        return view('siswa', $data);
    }
    public function createSiswa()
    {
        return view('siswa/form');
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
        unset($input['_token']);
        $status = DB::table('t_siswa')->insert($input);
        
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
        unset($input['_token']);
        unset($input['_method']);
        $status = DB::table('t_siswa')->where('id', $id)->update($input);
        
        if ($status) {
            return redirect('/siswa')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect('/siswa')->with('error', 'Data gagal diupdate');
        }
    }
    public function edit(Request $request, $id){
        $data['siswa'] = DB::table('t_siswa')->find($id);
        return view('siswa/form', $data);
    }
    public function destroy(Request $request, $id){
        $status = DB::table('t_siswa')->where('id', $id)->delete();
        
        if ($status) {
            return redirect('/siswa')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/siswa')->with('error', 'Data gagal dihapus');
        }
    }

    public function biodata()
    {
        return view('biodata');
    }
    public function lorem()
    {
        return view('lorem');
    }
    public function nama()
    {
        return view('nama');
    }
}