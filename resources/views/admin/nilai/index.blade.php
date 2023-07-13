@extends('layouts.app')

@section('title', 'Data Nilai Mahasiswa')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-12 mb-3">
                    <a href="{{ route('nilai.create') }}" class="btn btn-primary">
                        Tambah Data Nilai Mahasiswa
                    </a>
                </div>
                <div class="col-12 mb-3">
                    <table class="table table-bordered wrap responsive display table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Mahasiswa</th>
                                <th>Nilai</th>
                                <th>Mata Kuliah</th>
                                <th>Grade</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilai as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->mahasiswa->nama }}</td>
                                    <td>{{ $data->nilai }}</td>
                                    <td>{{ $data->mata_kuliah }}</td>
                                    <td>{{ $data->grade }}</td>
                                    <td>
                                        <a href="{{ route('nilai.edit', $data) }}" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>
                                        <a href="{{ route('nilai.destroy', $data) }}" data-confirm-delete="true"
                                            class="btn btn-sm btn-danger">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
