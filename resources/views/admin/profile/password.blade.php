@extends('layouts.app')

@section('title', 'Ganti Password')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('profile.passwordUpdate') }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="password" class="form-label">
                                    Password Baru
                                </label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Password Baru">
                                @error('password')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="password_confirmation" class="form-label">
                                    Konfirmasi Password Baru
                                </label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Konfirmasi Password Baru">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="mb-3 d-grid">
                                    <button type="submit" class="btn btn-primary">Ganti Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
