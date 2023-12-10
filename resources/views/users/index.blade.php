@extends('layouts.app')
@section('content')
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap<sup
                                    class="text-danger fw-bold">*</sup></label>
                            <input type="text" class="form-control" id="nama" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address <sup
                                    class="text-danger fw-bold">*</sup></label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password <sup
                                    class="text-danger fw-bold">*</sup></label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="mt-3">
        <h1>Data User</h1>
        <hr>
        {{-- <a href="#" class="mb-3 btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#exampleModal"><strong>+</strong>Add
            User</a> --}}
        <table class="table my-3 table-striped" id="dtb">
            <thead>
                <tr>
                    <th>#No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        {{-- <td>
                            <a href="#" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#No</th>
                    <th>Nama</th>
                    <th>Email</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
