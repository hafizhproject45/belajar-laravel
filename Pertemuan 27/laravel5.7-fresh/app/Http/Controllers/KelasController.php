<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class KelasController extends Controller
{
    public function index(){
        // $data['kelas'] = DB::table('t_kelas')
        // ->orderBy('lokasi_ruangan')
        // ->where('nama_wali_kelas', 'like', '%a%')
        // ->where('jurusan', 'like', 'RPL')
        // ->get();
        // return view('kelas', $data);
        $data['kelas'] = Kelas::orderBy('nama_kelas')->get();
        return view('kelas', $data);
    }
    public function createKelas()
    {
        return view('form/formKelas');
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
        // unset($input['_token']);
        // $status = DB::table('t_kelas')->insert($input);
        $kelas = new Kelas;
        $kelas->nama_kelas = $input['nama_kelas'];
        $kelas->jurusan = $input['jurusan'];
        $kelas->lokasi_ruangan = $input['lokasi_ruangan'];
        $kelas->nama_wali_kelas = $input['nama_wali_kelas'];
        $status = $kelas->save();
        
        if ($status) {
            return redirect('/kelas')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('/kelas')->with('error', 'Data gagal ditambahkan');
        }
    }
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama_kelas' => 'required',
            'jurusan' => 'required',
            'lokasi_ruangan' => 'required',
            'nama_wali_kelas' => 'required'
        ]);

        $input = $request->all();
        $kelas = Kelas::find($id);
        $status = $kelas->update($input);
        // unset($input['_token']);
        // unset($input['_method']);
        // $status = DB::table('t_kelas')->where('id', $id)->update($input);
        
        $kelas->nama_kelas = $input['nama_kelas'];
        $kelas->jurusan = $input['jurusan'];
        $kelas->lokasi_ruangan = $input['lokasi_ruangan'];
        $kelas->nama_wali_kelas = $input['nama_wali_kelas'];
        $status = $kelas->update();
        
        if ($status) {
            return redirect('/kelas')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect('/kelas')->with('error', 'Data gagal diupdate');
        }
    }
    public function edit(Request $request, $id){
        $data['kelas'] = DB::table('t_kelas')->find($id);
        return view('form/formKelas', $data);
    }
    public function destroy(Request $request, $id){
        $kelas = Kelas::find($id);
        $status = $kelas->delete();
        // $status = DB::table('t_kelas')->where('id', $id)->delete();
        
        if ($status) {
            return redirect('/kelas')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/kelas')->with('error', 'Data gagal dihapus');
        }
    }
}