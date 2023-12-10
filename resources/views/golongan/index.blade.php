@extends('layouts.app')
@section('content')
    <div class="mt-3">
        <h1>Data Golongan</h1>
        <hr>
        <a href="{{ url('golongan/create') }}" data-bs-toggle="modal" data-bs-target="#exampleModal"
            class="mb-3 btn btn-primary"><i class="fa-solid fa-user-plus"></i> Add
            Golongan</a>
        <table class="table table-striped" id="dtb">
            <thead>
                <tr>
                    <th>#No</th>
                    <th>Kode</th>
                    <th>Nama Golongan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->gol_kode }}</td>
                        <td>{{ $row->gol_nama }}</td>
                        <td>
                            <a href="#edit{{ $row->id }}" data-bs-toggle="modal" class="text-white btn btn-warning"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{ url('golongan/delete/' . $row->id) }}" class="btn btn-danger"
                                onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></a>
                            @include('golongan.edit')
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#No</th>
                    <th>Kode</th>
                    <th>Nama Golongan</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- Modal -->
    <form action="{{ url('golongan/store') }}" method="post">
        {{ csrf_field() }}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Golongan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Golongan <sup
                                    class="text-danger fw-bold">*</sup></label>
                            <input type="text" class="form-control" id="nama" aria-describedby="namaHelp"
                                name="nama_gol" required>
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
@endsection
