@extends('layouts.app')
@section('content')
    <div class="mt-3">
        <h1>Detail Data Pelanggan</h1>
        <hr>
        <table class="table mt-4 table-striped">
            <tbody>
                <tr>
                    <th>No Pelanggan</th>
                    <td class="border-start"></td>
                    <td>{{ $pelanggan->pel_no }}</td>
                </tr>
                <tr>
                    <th>Nama Pelanggan</th>
                    <td class="border-start"></td>
                    <td>{{ $pelanggan->pel_nama }}</td>
                </tr>
                <tr class="mb-3">
                    <th>Golongan Pelanggan</th>
                    <td class="border-start"></td>
                    <td>{{ $pelanggan->golongan->gol_nama }}</td>
                </tr>
                <tr>
                    <th>Alamat Pelanggan</th>
                    <td class="border-start"></td>
                    <td>{{ $pelanggan->pel_alamat }}</td>
                </tr>
                <tr>
                    <th>No Hp Pelanggan</th>
                    <td class="border-start"></td>
                    <td>{{ $pelanggan->pel_hp }}</td>
                </tr>
                <tr>
                    <th>No KTP Pelanggan</th>
                    <td class="border-start"></td>
                    <td>{{ $pelanggan->pel_ktp }}</td>
                </tr>
                <tr>
                    <th>No Seri PLN Pelanggan</th>
                    <td class="border-start"></td>
                    <td>{{ $pelanggan->pel_seri }}</td>
                </tr>
                <tr>
                    <th>No Meteran PLN Pelanggan</th>
                    <td class="border-start"></td>
                    <td>{{ $pelanggan->pel_meteran }}</td>
                </tr>
                <tr>
                    <th>Status Pelanggan</th>
                    <td class="border-start"></td>
                    @if ($pelanggan->pel_aktif === 'Y')
                        <td><span class="badge bg-success">Aktif</span></td>
                    @else
                        <td><span class="badge bg-danger">Tidak Aktif</span></td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
@endsection
