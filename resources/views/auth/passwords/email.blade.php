@extends('auth.layouts.app')

@section('title', 'Lupa Password')

@section('content')
<div class="auth-card">
    <p class="abe-kicker">Akun</p>
    <h1 class="h3 mt-2 mb-1">Reset password</h1>
    <p class="text-secondary mb-4">Kami kirim tautan reset ke email yang terdaftar.</p>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <button class="btn btn-dark w-100" type="submit">{{ __('Send Password Reset Link') }}</button>
    </form>
    <p class="text-center mt-3 mb-0"><a href="{{ route('login') }}">Kembali ke halaman masuk</a></p>
</div>
@endsection
