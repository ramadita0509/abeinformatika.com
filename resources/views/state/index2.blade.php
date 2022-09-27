@extends('layouts.app')

@section('title', 'Status')

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

    <div class="container" id="app">

    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Servis</h2>
            </div>
            {{-- <div class="float-right">
                <a class="btn btn-success" href="{{ route('state.create') }}"> Create</a>
            </div> --}}
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
     <form>
        <a href="{{ route('export-file', ['type'=>'xls']) }}" class="btn btn-sm btn-success">
            <i class="fas fa-check"></i> Export To Excel
        </a>
            <a href="{{ route('state.import') }}" class="btn btn-sm btn-success">
                <i class="fas fa-check"></i> Upload Data Servis
            </a>
    </form>
<br>
<br>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="280px"class="text-center">No Servis</th>
            <th width="280px"class="text-center">No RMA</th>
            <th width="280px"class="text-center">Nama Barang</th>
            <th width="280px"class="text-center">Serial Number</th>
            <th width="280px"class="text-center">Nama Customer</th>
            <th width="280px"class="text-center">Alamat</th>
            <th width="280px"class="text-center">Email</th>
            <th width="280px"class="text-center">Kerusakan</th>
            <th width="280px"class="text-center">Kelengkapan</th>
            <th width="280px"class="text-center">Keterangan</th>
            <th width="280px"class="text-center">Garansi</th>
            <th width="280px"class="text-center">Sparepart yang diganti</th>
            <th width="280px"class="text-center">Status</th>
            <th width="280px"class="text-center">Nama Teknisi</th>
            <th width="280px"class="text-center">Remark Teknisi</th>
            <th width="280px"class="text-center">Tanggal Masuk</th>
            <th width="280px"class="text-center">Tanggal Keluar</th>
        </tr>
        @foreach ($state as $i => $item)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $item->Invoice }}</td>
            <td>{{ $item->RMA }}</td>
            <td>{{ $item->NamaBarang }}</td>
            <td>{{ $item->SerialNumber }}</td>
            <td>{{ $item->NamaCustomer }}</td>
            <td>{{ $item->Alamat }}</td>
            <td>{{ $item->Email }}</td>
            <td>{{ $item->Kerusakan }}</td>
            <td>{{ $item->Kelengkapan }}</td>
            <td>{{ $item->Ket }}</td>
            <td>{{ $item->Garansi }}</td>
            <td>{{ $item->Sparepart }}</td>
            <td>{{ $item->Status }}</td>
            <td>{{ $item->NamaTeknisi }}</td>
            <td>{{ $item->Remark }}</td>
            <td>{{ $item->TglMasuk }}</td>
            <td>{{ $item->TglKeluar }}</td>
        </tr>
        @endforeach
    </table>
    </div>
</div>
</div>
    {{$state->links()}}

@endsection