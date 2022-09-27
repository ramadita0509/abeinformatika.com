@extends('layouts.app')

@section('title', 'Transaksi')

@section('content')

<div class="container-fluid">


    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Status</h1>
        <a href="{{route('state.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div> --}}

    {{-- Alert Messages --}}
    @include('common.alert')

        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Laporan Transaksi </h2>
                </div>
            </div>
        </div>


        @if ($message = Session::get('succes'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form method="POST">
            {{-- <a href="" button onclick="window.print()" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-print"></i> Print/Save to PDF</a> --}}
                <a href="{{ route('trx.export') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-check"></i> Export To Excel
                </a>
            <a href="{{ route('trx.import') }}" class="btn btn-sm btn-success">
                <i class="fas fa-check"></i> Upload Data Transaksi
            </a>
        </form>


    <br><br>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th width="20px" class="text-center">No</th>
                <th width="280px"class="text-center">No Invoice</th>
                <th width="280px"class="text-center">No RMA</th>
                <th width="280px"class="text-center">Nama Barang</th>
                <th width="280px"class="text-center">Serial Number</th>
                <th width="280px"class="text-center">Nama Customer</th>
                <th width="280px"class="text-center">Tlp</th>
                <th width="280px"class="text-center">Email</th>
                <th width="280px"class="text-center">Kerusakan</th>
                <th width="280px"class="text-center">Garansi</th>
                <th width="280px"class="text-center">Status</th>
                <th width="280px"class="text-center">Biaya Servis</th>
                <th width="280px"class="text-center">Biaya Sparepart</th>
                <th width="280px"class="text-center">Action</th>
            </tr>
            @foreach ($trx as $i => $item)
            <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{ $item->status->Invoice}} </td>
                <td>{{ $item->status->RMA}} </td>
                <td>{{ $item->status->NamaBarang}}</td>
                <td>{{ $item->status->SerialNumber}}</td>
                <td>{{ $item->status->NamaCustomer }}</td>
                <td>{{ $item->status->Tlp }}</td>
                <td>{{ $item->status->Email }}</td>
                <td>{{ $item->status->Kerusakan }}</td>
                <td>{{ $item->status->Garansi }}</td>
                <td>{{ $item->status->Status }}</td>
                <td>{{ $item->BiayaServis}}</td>
                <td>{{ $item->BiayaPart }}</td>
                <td class="text-center">
                    <form action="{{ route('trx.destroy',$item->id) }}" method="POST">

                       {{-- <a class="btn btn-info btn-sm" href="{{ route('trx.show',$item->id) }}">Show</a> --}}

                        <a class="btn btn-primary btn-sm" href="{{ route('trx.edit',$item->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>


 {{-- <script src="{{ mix('js/app.js') }}"></script> --}}

{{ $trx->links() }}


@endsection
