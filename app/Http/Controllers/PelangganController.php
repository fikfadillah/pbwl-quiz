<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PelangganController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows      = Pelanggan::all();
        $kodePel   = Pelanggan::generateKodePel();
        $noSeri    = Pelanggan::generateNoSeri();
        $noMeteran = Pelanggan::generateNoMeteran();
        $golongan  = Golongan::all();
        return view('pelanggan.index', compact('rows', 'kodePel', 'noSeri', 'noMeteran', 'golongan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pelanggan = Pelanggan::create([
            'pel_no' => $request->pel_no,
            'pel_id_gol' => $request->pel_id_gol,
            'pel_nama' => $request->pel_nama,
            'pel_alamat' => $request->pel_alamat,
            'pel_hp' => $request->pel_hp,
            'pel_ktp' => $request->pel_ktp,
            'pel_seri' => $request->pel_seri,
            'pel_meteran' => $request->pel_meteran,
            'pel_aktif' => $request->pel_aktif,
            'pel_id_user' => $request->pel_id_user,
        ]);

        return redirect('pelanggan')->with('success', 'Data pelanggan <strong>' . $pelanggan->pel_nama . '</strong> berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        return view('pelanggan.show', [
            'pelanggan' => $pelanggan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pelanggan.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Pelanggan::findOrFail($id);

        $row->update([
            'pel_nama' => $request->pel_nama,
            'pel_id_gol' => $request->pel_id_gol,
            'pel_alamat' => $request->pel_alamat,
            'pel_hp' => $request->pel_hp,
            'pel_aktif' => $request->pel_aktif,
        ]);

        return redirect('pelanggan')->with('success', 'Data pelanggan <strong>' . $row->pel_nama . '</strong> berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Pelanggan::findOrFail($id);

        $row->delete();

        return redirect('pelanggan')->with('success', 'Data pelanggan <strong>' . $row->pel_nama . '</strong> berhasil dihapus');
    }
}
