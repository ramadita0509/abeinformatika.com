@extends('layouts.app')

@section('title', 'Show')

@section('content')

    <title>Laporan Status All</title>
    <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="{{route('home')}}">Home</li></a>
        <li class="breadcrumb-item active">Laporan Status All</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Laporan Status All
                            </h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <form>
                                <a href="{{ route('trx.export', ['bulan' => $bulan]) }}" class="btn btn-sm btn-success">
                                    <i class="bi bi-file-earmark-spreadsheet"></i> Export Transaksi
                                </a>
                                <a href="{{ route('export-file', ['type' => 'xls', 'bulan' => $bulan]) }}" class="btn btn-sm btn-success">
                                    <i class="bi bi-file-earmark-spreadsheet"></i> Export Data Servis
                                </a>
                            </form>

                            <form action="{{ route('report.order') }}" method="get" class="month-filter mt-3">
                                <label for="bulan">Bulan</label>
                                <input type="month" id="bulan" name="bulan" value="{{ $bulan }}" class="form-control">
                                <button class="btn btn-sm btn-dark" type="submit">Tampilkan</button>
                                <a target="_blank" class="btn btn-sm btn-primary" href="{{ route('report.order_pdf', ['bulan' => $bulan]) }}">Export PDF</a>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No Servis</th>
                                            <th>No RMA</th>
                                            <th>Data Customer</th>
                                            <th>Nama Barang</th>
                                            <th>Kerusakan</th>
                                            <th>Biaya</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($rows as $row)
                                        @php $biaya = $row->transaksi->sortByDesc('id')->first(); @endphp
                                        <tr>
                                            <td><strong>{{ $row->Invoice }}</strong></td>
                                            <td><strong>{{ $row->RMA }}</strong></td>
                                            <td>
                                                <strong>{{ $row->NamaCustomer }}</strong><br>
                                                <label><strong>Telepon:</strong> {{ $row->Tlp }}</label><br>
                                                <label><strong>Alamat:</strong> {{ $row->Alamat }}</label>
                                            </td>
                                            <td>
                                                <strong>{{ $row->NamaBarang }}</strong><br>
                                                <label><strong>SN :</strong> {{ $row->SerialNumber }}</label><br>
                                                <label><strong>Kelengkapan :</strong> {{ $row->Kelengkapan }}</label>
                                            </td>
                                            <td>
                                                <strong>{{ $row->Status }}</strong><br>
                                                <label><strong>Kerusakan :</strong> {{ $row->Kerusakan }}</label><br>
                                                <label><strong>Remark Teknisi :</strong> {{ $row->Remark }}</label><br>
                                            </td>
                                            <td>
                                                @if ($biaya)
                                                <label><strong>Biaya Part :</strong> Rp. {{ $biaya->BiayaPart }}</label><br>
                                                <label><strong>Biaya Servis :</strong> {{ $biaya->BiayaServis }}</label><br>
                                                <label><strong>Total Biaya :</strong> {{ $biaya->BiayaTotal }}</label><br>
                                                @else
                                                <label>Belum ada invoice</label>
                                                @endif
                                            </td>
                                            <td>{{ $row->TglMasuk }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
<script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>
