@extends('layouts.app')

@section('title', 'Show')

@section('content')

    <title>Laporan Status All</title>
    <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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
                                <a href="{{ route('trx.export') }}" class="btn btn-sm btn-success">
                                    <i class="fas fa-check"></i> Export Transaksi
                                </a>
                                <a href="{{ route('export-file', ['type'=>'xls']) }}" class="btn btn-sm btn-success">
                                    <i class="fas fa-check"></i> Export Data Servis
                                </a>
                            </form>

                            <form action="{{ route('report.order') }}" method="get">
                                <div class="input-group mb-3 col-md-4 float-right">
                                    <input type="text" id="created_at" name="date" class="form-control">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">Filter</button>
                                    </div>
                                    <a target="_blank" class="btn btn-primary ml-2" id="exportpdf">Export PDF</a>
                                </div>
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
                                        @forelse ($trx as $row)
                                        <tr>
                                            <td><strong>{{ $row->status->Invoice }}</strong></td>
                                            <td><strong>{{ $row->status->RMA }}</strong></td>
                                            <td>
                                                <strong>{{ $row->status->NamaCustomer }}</strong><br>
                                                <label><strong>Telepon:</strong> {{ $row->status->Tlp}}</label><br>
                                                <label><strong>Alamat:</strong>{{ $row->status->Alamat }}</label>
                                            </td>
                                            <td>
                                                <strong>{{ $row->status->NamaBarang }}</strong><br>
                                                <label><strong>SN :</strong> {{ $row->status->SerialNumber }}</label><br>
                                                <label><strong>Kelengkapan :</strong>{{ $row->status->Kelengkapan }}</label>
                                            </td>
                                            <td>
                                                <strong>{{ $row->status->Kerusakan }}</strong><br>
                                                <label><strong>Remark Teknisi :</strong> {{ $row->status->Remark }}</label><br>
                                            </td>
                                            <td>
                                                <label><strong>Biaya Part :</strong>Rp. {{ $row->BiayaPart }}</label><br>
                                                <label><strong>Biaya Servis :</strong> {{ $row->BiayaServis }}</label><br>
                                                <label><strong>Total Biaya :</strong> {{ $row->BiayaTotal }}</label><br>
                                            </td>
                                            <td>{{ $row->status->created_at->format('d-m-Y') }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
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

{{-- @section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script>
        $(document).ready(function() {
            let start = moment().startOf('month')
            let end = moment().endOf('month')

            $('#exportpdf').attr('href', '/reports/order/pdf/' + start.format('YYYY-MM-DD') + '+' + end.format('YYYY-MM-DD'))

            $('#created_at').daterangepicker({
                startDate: start,
                endDate: end
            }, function(first, last) {
                $('#exportpdf').attr('href', '/reports/order/pdf/' + first.format('YYYY-MM-DD') + '+' + last.format('YYYY-MM-DD'))
            })
        })
    </script>
@endsection() --}}