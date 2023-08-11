<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['guru'] = Guru::orderBy('nama_guru')->get();
        return view('guru', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form/formGuru');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nip' => 'required|numeric|unique:t_guru',
            'nama_guru' => 'required|string',
            'jenkel' => 'required',
            'alamat' => 'required|string'
        ]);
        
        $input = $request->all();
        // unset($input['_token']);
        // $status = DB::table('t_kelas')->insert($input);
        $guru = new Guru;
        $guru->nip = $input['nip'];
        $guru->nama_guru = $input['nama_guru'];
        $guru->jenkel = $input['jenkel'];
        $guru->alamat = $input['alamat'];
        $status = $guru->save();
        
        if ($status) {
            return redirect('/guru')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('/guru')->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    
    public function edit($id)
    {
        $data['guru'] = DB::table('t_guru')->find($id);
        return view('form/formGuru', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nip' => 'required|numeric',
            'nama_guru' => 'required|string',
            'jenkel' => 'required',
            'alamat' => 'required|string'
        ]);

        $input = $request->all();
        $guru = Guru::find($id);
        // unset($input['_token']);
        // unset($input['_method']);
        // $status = DB::table('t_guru')->where('id', $id)->update($input);
        
        $guru->nip = $input['nip'];
        $guru->nama_guru = $input['nama_guru'];
        $guru->jenkel = $input['jenkel'];
        $guru->alamat = $input['alamat'];
        $status = $guru->update();
        
        if ($status) {
            return redirect('/guru')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect('/guru')->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guru = Guru::find($id);
        $status = $guru->delete();

        if ($status) {
            return redirect('/guru')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/guru')->with('error', 'Data gagal dihapus');
        }
    }
}