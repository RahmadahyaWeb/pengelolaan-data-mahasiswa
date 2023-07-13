@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row justify-content-center mb-3">
                        <div class="col-md-6">
                            <div class="text-center">
                                @if ($user->foto == null)
                                    <img src="{{ asset('profile.png') }}" alt="" class="img-fluid"
                                        style="border-radius: 100%">
                                @else
                                    <img src="/storage/foto/{{ $user->foto }}" alt="" class="img-fluid"
                                        style="border-radius: 100%">
                                @endif
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="username" class="form-label">
                                    Username
                                </label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" name="username" value="{{ old('username', $user->username) }}"
                                    placeholder="Username">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="foto" class="form-label">
                                    Foto
                                </label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                    id="foto" name="foto" value="{{ old('foto', $user->foto) }}" placeholder="foto"
                                    accept="image/png, image/gif, image/jpeg">
                                @error('foto')
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
