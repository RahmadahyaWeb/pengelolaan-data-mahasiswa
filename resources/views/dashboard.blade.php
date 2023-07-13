@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="row mb-3">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title m-0">
                        Selamat datang, {{ Auth::user()->username }}
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title m-0">
                        {{ \Illuminate\Support\Carbon::now()->translatedFormat('d F Y') }}
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body ">
                    <h5 class="card-title ">
                        Total Data Mahasiswa
                    </h5>
                    <h6 class="m-0">
                        {{ $mahasiswa }}
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body ">
                    <h5 class="card-title ">
                        Total Data Nilai
                    </h5>
                    <h6 class="m-0">
                        {{ $nilai }}
                    </h6>
                </div>
            </div>
        </div>
    </div>
@endsection
