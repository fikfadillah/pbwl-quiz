<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GolonganController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Golongan::all();
        return view('golongan.index', compact('rows'));
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
        $gol     = Golongan::latest()->first();
        $kodeGol = 'GOL';

        if ($gol == null) {
            $noUrut = '001';
        } else {
            $explode = explode('-', $gol->gol_kode);
            $noUrut  = $explode[1] + 1;
            $noUrut  = str_pad($noUrut, 3, "0", STR_PAD_LEFT);
        }

        $golKode = $kodeGol . '-' . $noUrut;

        $request->validate([
            'nama_gol' => 'required|string',
        ]);

        $golongan = Golongan::create([
            'gol_kode' => $golKode,
            'gol_nama' => $request->nama_gol,
        ]);

        return redirect('golongan')->with('success', 'Data golongan ' . $golongan->gol_nama . ' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Golongan::find($id);
        return view('golongan.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Golongan::findOrFail($id);

        $row->update([
            'gol_nama' => $request->nama_gol,
        ]);

        return redirect('golongan')->with('success', 'Data golongan <strong>' . $row->gol_nama . '</strong> berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Golongan::findOrFail($id);

        $row->delete();

        return redirect('golongan')->with('success', 'Data golongan <strong>' . $row->gol_nama . '</strong> berhasil dihapus');
    }
}
