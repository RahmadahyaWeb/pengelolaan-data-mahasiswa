@extends('layouts.app')

@section('title', 'Edit Data Nilai Mahasiswa')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('nilai.update', $nilai) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
                                <select name="mahasiswa_id" id="mahasiswa_id"
                                    class="form-select @error('mahasiswa_id') is-invalid @enderror">
                                    <option selected disabled>Pilih Mahasiswa</option>
                                    @foreach ($mahasiswa as $data)
                                        <option value="{{ $data->id }}" @selected(old('mahasiswa_id', $nilai->mahasiswa_id) == $data->id)>{{ $data->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('mahasiswa_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="mata_kuliah" class="form-label">Mata Kuliah</label>
                                <input type="text" class="form-control @error('mata_kuliah') is-invalid @enderror "
                                    id="mata_kuliah" name="mata_kuliah"
                                    value="{{ old('mata_kuliah', $nilai->mata_kuliah) }}" placeholder="Nama Mata Kuliah">
                                @error('mata_kuliah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="nilai" class="form-label">Nilai</label>
                                <input type="text" class="form-control @error('nilai') is-invalid @enderror"
                                    maxlength="3" id="nilai" name="nilai" value="{{ old('nilai', $nilai->nilai) }}"
                                    placeholder="Nilai Mahasiswa">
                                @error('nilai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 text-end">
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
