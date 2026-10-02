@extends('auth.layouts.app')

@section('title', 'Masuk')

@section('content')
<div class="auth-card">
    <p class="abe-kicker">Panel internal</p>
    <h1 class="h3 mt-2 mb-1">Masuk ke ABE Informatika</h1>
    <p class="text-secondary mb-4">Gunakan akun yang sudah terdaftar.</p>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Ingat saya</label>
        </div>
        <button class="btn btn-dark w-100" type="submit">Masuk</button>
    </form>
    <p class="text-center mt-3 mb-0"><a href="{{ route('password.request') }}">Lupa password?</a></p>
    <p class="text-center mt-3 mb-0"><a href="{{ route('welcome') }}">Kembali ke beranda</a></p>
</div>
@endsection
