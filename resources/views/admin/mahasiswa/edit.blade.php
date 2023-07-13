@extends('layouts.app')

@section('title', 'Edit Data Mahasiswa')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('mahasiswa.update', $mahasiswa) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control @error('nim') is-invalid @enderror "
                                    id="nim" name="nim" value="{{ old('nim', $mahasiswa->nim) }}"
                                    placeholder="NIM Mahasiswa" maxlength="10">
                                @error('nim')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror "
                                    id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}"
                                    placeholder="Nama Mahasiswa">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="program_studi" class="form-label">Program Studi</label>
                                <input type="text" class="form-control @error('program_studi') is-invalid @enderror "
                                    id="program_studi" name="program_studi"
                                    value="{{ old('program_studi', $mahasiswa->program_studi) }}"
                                    placeholder="Program Studi Mahasiswa">
                                @error('program_studi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="no_hp" class="form-label">NO HP</label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror "
                                    id="no_hp" name="no_hp" value="{{ old('no_hp', $mahasiswa->no_hp) }}"
                                    placeholder="Nomor HP Mahasiswa" maxlength="13">
                                @error('no_hp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 text-end">
                                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
