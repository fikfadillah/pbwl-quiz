<form action="{{ url('pelanggan/edit/' . $row->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <div class="modal fade" id="edit{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pelanggan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pelanggan <sup
                                class="text-danger fw-bold">*</sup></label>
                        <input type="text" class="form-control" id="pel_nama" name="pel_nama"
                            value="{{ $row->pel_nama }}">
                    </div>
                    <div class="mb-3">
                        <label for="golongan" class="form-label">Golongan Pelanggan <sup
                                class="text-danger fw-bold">*</sup></label>
                        <select name="pel_id_gol" id="gol" class="form-select">
                            @foreach ($golongans as $golongan)
                                <option value="{{ $golongan->id }}"
                                    {{ $golongan->id == $row->golongan->id ? 'selected' : '' }}>
                                    {{ $golongan->gol_nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Pelanggan <sup
                                class="text-danger fw-bold">*</sup></label>
                        <input type="text" class="form-control" id="pel_alamat" name="pel_alamat"
                            value="{{ $row->pel_alamat }}">
                    </div>
                    <div class="mb-3">
                        <label for="hp" class="form-label">No HP Pelanggan <sup
                                class="text-danger fw-bold">*</sup></label>
                        <input type="text" class="form-control" id="pel_hp" name="pel_hp"
                            value="{{ $row->pel_hp }}">
                    </div>
                    <div class="mb-3">
                        <label for="aktif" class="form-label">Status <sup class="text-danger fw-bold">*</sup></label>
                        <select name="pel_aktif" id="aktif" class="form-select">
                            <option value="Y" {{ $row->pel_aktif == 'Y' ? 'selected' : '' }}>Aktif</option>
                            <option value="N" {{ $row->pel_aktif == 'N' ? 'selected' : '' }}>Tidak Aktif</option>
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
