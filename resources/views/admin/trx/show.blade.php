@extends('layouts.app')

@section('title', 'Invoice')

@section('content')
@php
    $rupiah = function ($value) {
        if ($value === null || $value === '') {
            return '—';
        }
        return 'Rp '.number_format((float) $value, 0, ',', '.');
    };
    $service = $trx->status;
@endphp
<div class="svc-page">
    <div class="abe-page-head noPrint">
        <div>
            <p class="abe-kicker">Transaksi</p>
            <h1>Invoice</h1>
        </div>
        <div class="d-flex gap-2">
            <a class="btn btn-outline-secondary" href="{{ route('trx.index') }}">
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
                <span>No. Invoice</span>
                <strong class="inv-code">{{ $trx->Invoice }}</strong>
            </div>
        </header>

        <div class="svc-grid">
            <section class="svc-block">
                <h3>Pelanggan</h3>
                <div class="svc-rows">
                    <div><strong>Nama</strong><span>{{ $service->NamaCustomer ?: '—' }}</span></div>
                    <div><strong>Alamat</strong><span>{{ $service->Alamat ?: '—' }}</span></div>
                    <div><strong>Telepon</strong><span>{{ $service->Tlp ?: '—' }}</span></div>
                    <div><strong>Email</strong><span>{{ $service->Email ?: '—' }}</span></div>
                    <div><strong>No. servis</strong><span>{{ $service->Invoice ?: '—' }}</span></div>
                </div>
            </section>
            <section class="svc-block">
                <h3>Tagihan</h3>
                <div class="svc-rows">
                    <div><strong>Tanggal</strong><span>{{ $service->TglKeluar ?: '—' }}</span></div>
                    <div><strong>Jatuh tempo</strong><span>{{ $service->TglKeluar ? '30 hari dari '.$service->TglKeluar : '—' }}</span></div>
                    <div><strong>Nama barang</strong><span>{{ $service->NamaBarang ?: '—' }}</span></div>
                    <div><strong>Serial number</strong><span>{{ $service->SerialNumber ?: '—' }}</span></div>
                </div>
            </section>
        </div>

        <table class="inv-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th class="num">Biaya</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Sparepart yang diganti</td>
                    <td>{{ $service->Sparepart ?: '—' }}</td>
                    <td class="num">{{ $rupiah($trx->BiayaPart) }}</td>
                </tr>
                <tr>
                    <td>Biaya jasa</td>
                    <td>—</td>
                    <td class="num">{{ $rupiah($trx->BiayaServis) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="inv-total">
            <div>
                <span>Grand total</span>
                <span>{{ $rupiah($trx->BiayaTotal) }}</span>
            </div>
        </div>

        <div class="inv-note">
            <strong>Catatan</strong>
            <p>Barang yang sudah dibeli tidak dapat ditukar lagi.</p>
            <p>Invoice ini dibuat oleh komputer dan berlaku tanpa tanda tangan serta stempel.</p>
        </div>
    </article>
</div>
@endsection
