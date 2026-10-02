<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman tidak ditemukan</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
</head>
<body class="auth-body">
    <div class="auth-card text-center">
        <i class="bi bi-signpost-split" style="font-size:2rem;color:#0f766e;"></i>
        <h1 class="h3 mt-3">Halaman tidak ditemukan</h1>
        <p class="text-secondary">Alamat yang dibuka tidak ada di sistem.</p>
        <a class="btn btn-dark" href="{{ auth()->check() ? route('home') : route('welcome') }}">Kembali</a>
    </div>
</body>
</html>
