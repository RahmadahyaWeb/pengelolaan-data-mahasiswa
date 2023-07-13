@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-12 mb-3">
                    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
                        Tambah Data Mahasiswa
                    </a>
                </div>
                <div class="col-12 mb-3">
                    <table class="table table-bordered wrap responsive display table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Program Studi</th>
                                <th>No HP</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nim }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->program_studi }}</td>
                                    <td>{{ $data->no_hp }}</td>
                                    <td>
                                        <a href="{{ route('mahasiswa.edit', $data) }}" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>
                                        <a href="{{ route('mahasiswa.destroy', $data) }}" data-confirm-delete="true"
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
