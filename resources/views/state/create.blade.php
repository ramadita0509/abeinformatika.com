@extends('layouts.app')

@section('title', 'Status')

@section('content')

<div class="container" id="app">
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Create Data Servis</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('state.index') }}"> Kembali</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Input gagal.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('state.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>No Servis:</strong>
                <input type="text" name="Invoice" class="form-control" placeholder="No Servis">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>RMA Number:</strong>
                <input type="text" name="RMA" class="form-control" placeholder="RMA Number">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Nama Barang:</strong>
                <input type="text" name="NamaBarang" class="form-control" placeholder="Nama Barang">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Serial Number:</strong>
                <input type="text" name="SerialNumber" class="form-control" placeholder="Serial Number">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Nama Customer:</strong>
                <input type="text" name="NamaCustomer" class="form-control" placeholder="Nama Customer">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="text" name="Alamat" class="form-control" placeholder="Alamat">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Telp:</strong>
                <input type="text" name="Tlp" class="form-control" placeholder="Telp">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="Email" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Kerusakan:</strong>
                <input type="text" name="Kerusakan" class="form-control" placeholder="Kerusakan">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Kelengkapan:</strong>
                <input type="text" name="Kelengkapan" class="form-control" placeholder="kelengkapan">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Keterangan:</strong>
                <input type="text" name="Ket" class="form-control">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Garansi:</strong>
                <input type="date" name="Garansi" class="form-control">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Sparepart yang diganti :</strong>
                <input type="text" name="Sparepart" class="form-control">
            </div>
        </div>

        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Status:</strong>
                <select name="Status" class="form-control">
                    <option value ="In Progress"> In Progress</option>
                    <option value ="Closed"> Closed</option>
                </select>
            </div>
        </div>

        {{-- <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Status:</strong>
            <select class="form-control select2" style="width: 100;" name="id_updatestatus" id="id_updatestatus">
                <option disabled value> Pilih Status </option>
                @foreach ($update as $item)
                <option value="{{ $item->id }}"> {{ $item->UpdateStatus}}</option>
                @endforeach
            </select>
            </div>
        </div> --}}
        <br>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Tanggal Masuk:</strong>
                <input type="date" name="TglMasuk" class="form-control">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Tanggal Keluar:</strong>
                <input type="date" name="TglKeluar" class="form-control">
            </div>
        </div>
    </div>
<br>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
<br>
</form>
</div>

@endsection