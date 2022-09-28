@extends('layouts.app')

@section('title', 'Edit')

@section('content')

<div class="container" id="app">

    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Status</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('state.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('state.update',$state->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @hasrole('user')
        <div class="row">
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>No Invoice:</strong>
                <input type="text" name="Invoice" value="{{ old('Invoice', $state->Invoice) }}" class="form-control" placeholder="No Invoice" disabled>
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Nama Barang:</strong>
                <input type="text" name="NamaBarang" value="{{ $state->NamaBarang }}" class="form-control" placeholder="Nama Barang">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Serial Number:</strong>
                <input type="text" name="SerialNumber" value="{{ $state->SerialNumber }}" class="form-control" placeholder="Serial Number">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Nama Customer:</strong>
                <input type="text" name="NamaCustomer" value="{{ $state->NamaCustomer }}" class="form-control" placeholder="Nama Customer">
            </div>
        </div>
        @endhasrole
        @hasrole('teknisi')
        <div class="row">
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>No Invoice:</strong>
                <input type="text" name="Invoice" value="{{ old('Invoice', $state->Invoice) }}" class="form-control" placeholder="No Invoice" disabled>
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Nama Barang:</strong>
                <input type="text" name="NamaBarang" value="{{ $state->NamaBarang }}" class="form-control" placeholder="Nama Barang" disabled>
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Serial Number:</strong>
                <input type="text" name="SerialNumber" value="{{ $state->SerialNumber }}" class="form-control" placeholder="Serial Number" disabled>
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Nama Customer:</strong>
                <input type="text" name="NamaCustomer" value="{{ $state->NamaCustomer }}" class="form-control" placeholder="Nama Customer" disabled>
            </div>
        </div>
        @endhasrole
        @hasrole('admin')
        <div class="row">
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>No Invoice:</strong>
                <input type="text" name="Invoice" value="{{ old('Invoice', $state->Invoice) }}" class="form-control" placeholder="No Invoice" disabled>
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Nama Barang:</strong>
                <input type="text" name="NamaBarang" value="{{ $state->NamaBarang }}" class="form-control" placeholder="Nama Barang">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Serial Number:</strong>
                <input type="text" name="SerialNumber" value="{{ $state->SerialNumber }}" class="form-control" placeholder="Serial Number">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Nama Customer:</strong>
                <input type="text" name="NamaCustomer" value="{{ $state->NamaCustomer }}" class="form-control" placeholder="Nama Customer">
            </div>
        </div>
        @endhasrole
        @hasrole('user')
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="text" name="Alamat" value="{{ $state->Alamat }}" class="form-control" placeholder="Alamat">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>No Telepon:</strong>
                <input type="text" name="Tlp" value="{{ $state->Tlp }}" class="form-control" placeholder="Tlp">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="Email" class="form-control" value="{{ $state->Email }}" placeholder="Email">
            </div>
        </div>
        @endhasrole
        @hasrole('teknisi')
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Kerusakan:</strong>
                <input type="text" name="Kerusakan" class="form-control" value="{{ $state->Kerusakan }}" placeholder="Kerusakan" disabled>
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Kelengkapan:</strong>
                <input type="text" name="Kelengkapan" class="form-control" value="{{ $state->Kelengkapan }}" placeholder="Kelengkapan" disabled>
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Garansi:</strong>
                <input type="date" name="Garansi" class="form-control" value="{{ $state->Garansi }}" disabled>
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Keterangan:</strong>
                <input type="text" name="Ket" class="form-control" value="{{ $state->Ket }}" placeholder="Keterangan" disabled>
            </div>
        </div>
        @endhasrole
        @hasrole('user')
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Kerusakan:</strong>
                <input type="text" name="Kerusakan" class="form-control" value="{{ $state->Kerusakan }}" placeholder="Kerusakan" >
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Kelengkapan:</strong>
                <input type="text" name="Kelengkapan" class="form-control" value="{{ $state->Kelengkapan }}" placeholder="Kelengkapan" >
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Garansi:</strong>
                <input type="date" name="Garansi" class="form-control" value="{{ $state->Garansi }}">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Keterangan:</strong>
                <input type="text" name="Ket" class="form-control" value="{{ $state->Ket }}" placeholder="Keterangan">
            </div>
        </div>
        @endhasrole
        @hasrole('admin')
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Kerusakan:</strong>
                <input type="text" name="Kerusakan" class="form-control" value="{{ $state->Kerusakan }}" placeholder="Kerusakan" >
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Kelengkapan:</strong>
                <input type="text" name="Kelengkapan" class="form-control" value="{{ $state->Kelengkapan }}" placeholder="Kelengkapan" >
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Garansi:</strong>
                <input type="date" name="Garansi" class="form-control" value="{{ $state->Garansi }}">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Keterangan:</strong>
                <input type="text" name="Ket" class="form-control" value="{{ $state->Ket }}" placeholder="Keterangan">
            </div>
        </div>
        @endhasrole

        @hasrole('user')
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Status:</strong>
                <select name="Status" class="form-control" value="{{ $state->Status }}">
                    <option value ="In Progress"> In Progress</option>
                    <option value ="Closed"> Closed</option>
                </select>
            </div>
        </div>
        @endhasrole
        @hasrole('teknisi')
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Status:</strong>
                <select name="Status" class="form-control" value="{{ $state->Status }}">
                    <option value ="In Progress"> In Progress</option>
                    <option value ="Finish"> Finish</option>
                </select>
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Nama Teknisi:</strong>
                <input type="text" name="NamaTeknisi" value="{{ $state->NamaTeknisi }}" class="form-control" placeholder="Nama Teknisi">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Remark Teknisi:</strong>
                <input type="text" name="Remark" value="{{ $state->Remark }}" class="form-control" placeholder="Remark Teknisi">
            </div>
        </div>
        @endhasrole
        @hasrole('user')
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Tanggal Masuk:</strong>
                <input type="date" name="TglMasuk" value="{{ $state->TglMasuk }}" class="form-control" placeholder="TglMasuk">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Tanggal Keluar:</strong>
                <input type="date" name="TglKeluar" value="{{ $state->TglKeluar }}" class="form-control" placeholder="TglKeluar">
            </div>
        </div>
        @endhasrole

        @hasrole('admin')
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="text" name="Alamat" value="{{ $state->Alamat }}" class="form-control" placeholder="Alamat">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>No Telepon:</strong>
                <input type="text" name="Tlp" value="{{ $state->Tlp }}" class="form-control" placeholder="Tlp">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="Email" class="form-control" value="{{ $state->Email }}" placeholder="Email">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Kerusakan:</strong>
                <input type="text" name="Kerusakan" class="form-control" value="{{ $state->Kerusakan }}" placeholder="Kerusakan">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Kelengkapan:</strong>
                <input type="text" name="Kelengkapan" class="form-control" value="{{ $state->Kelengkapan }}" placeholder="Kelengkapan">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Garansi:</strong>
                <input type="date" name="Garansi" class="form-control" value="{{ $state->Garansi }}">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Keterangan:</strong>
                <input type="text" name="Ket" class="form-control" value="{{ $state->Ket }}" placeholder="Keterangan">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Status:</strong>
                <select name="Status" class="form-control" value="{{ $state->Status }}">
                    <option value ="In Progress"> In Progress</option>
                    <option value ="In Progress"> Finish</option>
                    <option value ="Closed"> Closed</option>
                </select>
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Nama Teknisi:</strong>
                <input type="text" name="NamaTeknisi" value="{{ $state->NamaTeknisi }}" class="form-control" placeholder="Nama Teknisi">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Remark Teknisi:</strong>
                <input type="text" name="Remark" value="{{ $state->Remark }}" class="form-control" placeholder="Remark Teknisi">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Tanggal Masuk:</strong>
                <input type="date" name="TglMasuk" value="{{ $state->TglMasuk }}" class="form-control" placeholder="TglMasuk">
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Tanggal Keluar:</strong>
                <input type="date" name="TglKeluar" value="{{ $state->TglKeluar }}" class="form-control" placeholder="TglKeluar">
            </div>
        </div>
        @endhasrole
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

    </form>
</div>
@endsection