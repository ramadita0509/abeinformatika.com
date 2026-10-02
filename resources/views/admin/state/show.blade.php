@extends('layouts.app')

@section('title', 'Detail Servis')

@section('content')
<div class="svc-page">
    <div class="abe-page-head noPrint">
        <div>
            <p class="abe-kicker">Servis</p>
            <h1>Detail servis</h1>
        </div>
        <div class="d-flex gap-2">
            <a class="btn btn-outline-secondary" href="{{ route('state.index') }}">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="button" class="btn btn-dark" onclick="window.print()">
                <i class="bi bi-printer"></i> Cetak
            </button>
        </div>
    </div>

    <article class="svc-sheet">
        <header class="svc-head">
            <img class="svc-logo" src="{{ asset('assets/img/logo-abe.jpg') }}" alt="ABE Informatika">
            <div class="svc-brand">
                <h2>CV. ABE INFORMATIKA</h2>
                <p>Authorized Service Partner Asus, Lenovo, Zyrex, Avita, Brother</p>
                <p>Jl. Ibrahim Adjie No.3A, Indihiang, Tasikmalaya · Tlp. 0265-7520857 · <i class="bi bi-whatsapp"></i> 085723597692</p>
            </div>
            <div class="svc-no">
                <span>No. Servis</span>
                <strong>{{ $state->Invoice }}</strong>
                @if ($state->Status)
                    <span class="svc-badge">{{ $state->Status }}</span>
                @endif
            </div>
        </header>

        <div class="svc-grid">
            <section class="svc-block">
                <h3>Pelanggan</h3>
                <div class="svc-rows">
                    <div><strong>Nama</strong><span>{{ $state->NamaCustomer ?: '—' }}</span></div>
                    <div><strong>Alamat</strong><span>{{ $state->Alamat ?: '—' }}</span></div>
                    <div><strong>Telepon</strong><span>{{ $state->Tlp ?: '—' }}</span></div>
                    <div><strong>Email</strong><span>{{ $state->Email ?: '—' }}</span></div>
                </div>
            </section>
            <section class="svc-block">
                <h3>Perangkat</h3>
                <div class="svc-rows">
                    <div><strong>Nama barang</strong><span>{{ $state->NamaBarang ?: '—' }}</span></div>
                    <div><strong>Serial number</strong><span>{{ $state->SerialNumber ?: '—' }}</span></div>
                    <div><strong>No. RMA</strong><span>{{ $state->RMA ?: '—' }}</span></div>
                    <div><strong>Kerusakan</strong><span>{{ $state->Kerusakan ?: '—' }}</span></div>
                    <div><strong>Kelengkapan</strong><span>{{ $state->Kelengkapan ?: '—' }}</span></div>
                    <div><strong>Garansi</strong><span>{{ $state->Garansi ?: '—' }}</span></div>
                    <div><strong>Sparepart</strong><span>{{ $state->Sparepart ?: '—' }}</span></div>
                    <div><strong>Keterangan</strong><span>{{ $state->Ket ?: '—' }}</span></div>
                </div>
            </section>
        </div>

        <div class="svc-meta">
            <article>
                <span class="svc-label">Tanggal masuk</span>
                <strong>{{ $state->TglMasuk ?: '—' }}</strong>
            </article>
            <article>
                <span class="svc-label">Tanggal diambil</span>
                <strong>{{ $state->TglKeluar ?: '—' }}</strong>
            </article>
            <article>
                <span class="svc-label">Teknisi</span>
                <strong>{{ $state->NamaTeknisi ?: '—' }}</strong>
            </article>
            <article>
                <span class="svc-label">Remark</span>
                <strong>{{ $state->Remark ?: '—' }}</strong>
            </article>
        </div>

        <div class="svc-sign">
            <div>
                <p>Pelanggan</p>
                <hr>
                <small>{{ $state->NamaCustomer }}</small>
            </div>
            <div>
                <p>Customer Service</p>
                <hr>
                <small>CV. ABE Informatika</small>
            </div>
        </div>
    </article>
</div>
@endsection
