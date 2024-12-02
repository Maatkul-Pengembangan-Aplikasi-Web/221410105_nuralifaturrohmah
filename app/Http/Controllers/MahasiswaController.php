<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    
    public function create()
    {
        $prodis = Prodi::all();
        return view('mahasiswa.create', compact('prodis'));
    }

    public function save(Request $request)
    {
        $validation = $request->validate([
            'nama' => 'required',
            'npm' => 'required|numeric',
            'prodi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $namaFoto = $request->npm . '.' . $request->foto->extension();
            $request->foto->move(public_path('fotomahasiswa'), $namaFoto);
            $validation['foto'] = $namaFoto;
        }

        $mahasiswa = Mahasiswa::create($validation);

        if ($mahasiswa) {
            session()->flash('success', 'Data Mahasiswa Berhasil di Tambahkan');
            return redirect(route('/mahasiswa'));
        } else {
            session()->flash('error', 'Ada Kesalahan');
            return redirect(route('mahasiswa/create'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
