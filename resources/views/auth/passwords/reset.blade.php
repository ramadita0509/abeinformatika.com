@extends('auth.layouts.app')

@section('title', 'Password Baru')

@section('content')
<div class="auth-card">
    <p class="abe-kicker">Akun</p>
    <h1 class="h3 mt-2 mb-4">Buat password baru</h1>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password baru</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password-confirm" class="form-label">Ulangi password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
        <button class="btn btn-dark w-100" type="submit">{{ __('Reset Password') }}</button>
    </form>
</div>
@endsection
