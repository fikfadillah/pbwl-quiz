@extends('layouts.app')
@section('content')
    <div class="mt-3">
        <h1>Data Pelanggan</h1>
        <hr>
        <!-- Button trigger modal -->
        <a href="{{ url('pelanggan/create') }}" class="mb-3 btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#exampleModal"><i class="fa-solid fa-user-plus"></i> Add
            Pelanggan</a>
        </button>
        <table class="table my-3 table-striped bgindi" id="dtb">
            <thead>
                <tr>
                    <th>#No</th>
                    <th>No Pelanggan</th>
                    <th>Nama</th>
                    <th>Golongan</th>
                    <th>No Seri PLN</th>
                    <th>No Meteran</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->pel_no }}</td>
                        <td>{{ $row->pel_nama }}</td>
                        <td>{{ $row->golongan['gol_nama'] }}</td>
                        <td>{{ $row->pel_seri }}</td>
                        <td>{{ $row->pel_meteran }}</td>
                        @if ($row->pel_aktif === 'Y')
                            <td><span class="badge bg-success">Aktif</span></td>
                        @else
                            <td><span class="badge bg-danger">NonAktif</span></td>
                        @endif
                        <td>
                            <a href="{{ route('pelanggan.show', $row->id) }}" class="text-white btn btn-info fw-bold"><i
                                    class="fa-solid fa-table"></i></a>
                            <a href="#edit{{ $row->id }}" data-bs-toggle="modal" class="text-white btn btn-warning"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{ url('pelanggan/delete/' . $row->id) }}" class="btn btn-danger"
                                onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></a>
                            @include('pelanggan.edit')
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#No</th>
                    <th>No Pelanggan</th>
                    <th>Nama</th>
                    <th>Golongan</th>
                    <th>No Seri PLN</th>
                    <th>No Meteran</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- Start Modal -->
    <form action="{{ url('pelanggan/store') }}" method="post">
        <input type="hidden" value="{{ Auth::user()->id }}" name="pel_id_user">
        {{ csrf_field() }}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Pelanggan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="no" class="form-label">No Pelanggan <sup
                                    class="text-danger fw-bold">*</sup></label>
                            <input type="text" class="form-control" id="nama" name="pel_no"
                                value="{{ $kodePel }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="golongan" class="form-label">Golongan Pelanggan <sup
                                    class="text-danger fw-bold">*</sup></label>
                            <select name="pel_id_gol" id="gol" class="form-select">
                                @foreach ($golongan as $row)
                                    <option value="{{ $row->id }}">{{ $row->gol_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Pelanggan <sup
                                    class="text-danger fw-bold">*</sup></label>
                            <input type="text" class="form-control" id="pel_nama" name="pel_nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Pelanggan <sup
                                    class="text-danger fw-bold">*</sup></label>
                            <input type="text" class="form-control" id="pel_alamat" name="pel_alamat" required>
                        </div>
                        <div class="mb-3">
                            <label for="hp" class="form-label">No Hp <sup class="text-danger fw-bold">*</sup></label>
                            <input type="text" class="form-control" id="pel_hp" name="pel_hp" required>
                        </div>
                        <div class="mb-3">
                            <label for="ktp" class="form-label">No KTP <sup class="text-danger fw-bold">*</sup></label>
                            <input type="text" class="form-control" id="pel_ktp" name="pel_ktp" required>
                        </div>
                        <div class="mb-3">
                            <label for="seri" class="form-label">No Seri <sup
                                    class="text-danger fw-bold">*</sup></label>
                            <input type="text" class="form-control" id="pel_seri" name="pel_seri"
                                value="{{ $noSeri }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="meteran" class="form-label">No Meteran <sup
                                    class="text-danger fw-bold">*</sup></label>
                            <input type="text" class="form-control" id="pel_meteran" name="pel_meteran"
                                value="{{ $noMeteran }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="aktif" class="form-label">Status <sup
                                    class="text-danger fw-bold">*</sup></label>
                            <select name="pel_aktif" id="aktif" class="form-select">
                                <option value="Y">Aktif</option>
                                <option value="N">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal -->
@endsection
