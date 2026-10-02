@extends('layouts.app')

@section('title', 'Edit')

@section('content')
@php
    $account = auth()->user();
    $isAdmin = $account && $account->hasRole('admin');
    $isTeknisi = $account && $account->hasRole('teknisi');
    $isUser = $account && $account->hasRole('user');
@endphp

<div class="container" id="app">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Edit Status</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-secondary" href="{{ route('state.index') }}">Back</a>
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

    <form action="{{ route('state.update', $state->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            @if ($isAdmin || $isTeknisi || $isUser)
                <div class="col-sm-5 col-md-6">
                    <div class="form-group">
                        <strong>No Service:</strong>
                        <input type="text" name="Invoice" value="{{ old('Invoice', $state->Invoice) }}" class="form-control" placeholder="No Invoice" disabled>
                    </div>
                </div>
                <div class="col-sm-5 col-md-6">
                    <div class="form-group">
                        <strong>No RMA:</strong>
                        <input type="text" name="RMA" value="{{ old('RMA', $state->RMA) }}" class="form-control" placeholder="No RMA" disabled>
                    </div>
                </div>
                <div class="col-sm-5 col-md-6">
                    <div class="form-group">
                        <strong>Nama Barang:</strong>
                        <input type="text" name="NamaBarang" value="{{ $state->NamaBarang }}" class="form-control" placeholder="Nama Barang" @disabled(! $isAdmin)>
                    </div>
                </div>
                <div class="col-sm-5 col-md-6">
                    <div class="form-group">
                        <strong>Serial Number:</strong>
                        <input type="text" name="SerialNumber" value="{{ $state->SerialNumber }}" class="form-control" placeholder="Serial Number" @disabled(! $isAdmin)>
                    </div>
                </div>
                <div class="col-sm-5 col-md-6">
                    <div class="form-group">
                        <strong>Nama Customer:</strong>
                        <input type="text" name="NamaCustomer" value="{{ $state->NamaCustomer }}" class="form-control" placeholder="Nama Customer" @disabled(! $isAdmin)>
                    </div>
                </div>
            @endif

            @if ($isAdmin || $isUser)
                <div class="col-sm-5 col-md-6">
                    <div class="form-group">
                        <strong>Alamat:</strong>
                        <input type="text" name="Alamat" value="{{ $state->Alamat }}" class="form-control" placeholder="Alamat" @disabled(! $isAdmin)>
                    </div>
                </div>
                <div class="col-sm-5 col-md-6">
                    <div class="form-group">
                        <strong>No Telepon:</strong>
                        <input type="text" name="Tlp" value="{{ $state->Tlp }}" class="form-control" placeholder="Tlp" @disabled(! $isAdmin)>
                    </div>
                </div>
                <div class="col-sm-5 col-md-6">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="text" name="Email" value="{{ $state->Email }}" class="form-control" placeholder="Email" @disabled(! $isAdmin)>
                    </div>
                </div>
            @endif

            @if ($isAdmin || $isTeknisi || $isUser)
                <div class="col-sm-5 col-md-6">
                    <div class="form-group">
                        <strong>Kerusakan:</strong>
                        <input type="text" name="Kerusakan" value="{{ $state->Kerusakan }}" class="form-control" placeholder="Kerusakan" @disabled(! $isAdmin)>
                    </div>
                </div>
                <div class="col-sm-5 col-md-6">
                    <div class="form-group">
                        <strong>Kelengkapan:</strong>
                        <input type="text" name="Kelengkapan" value="{{ $state->Kelengkapan }}" class="form-control" placeholder="Kelengkapan" @disabled(! $isAdmin)>
                    </div>
                </div>
                <div class="col-sm-5 col-md-6">
                    <div class="form-group">
                        <strong>Garansi:</strong>
                        <input type="date" name="Garansi" value="{{ $state->Garansi }}" class="form-control" @disabled(! $isAdmin)>
                    </div>
                </div>
                <div class="col-sm-5 col-md-6">
                    <div class="form-group">
                        <strong>Keterangan:</strong>
                        <input type="text" name="Ket" value="{{ $state->Ket }}" class="form-control" placeholder="Keterangan" @disabled(! $isAdmin)>
                    </div>
                </div>
            @endif

            @if ($isAdmin || $isUser)
                <div class="col-sm-5 col-md-6">
                    <div class="form-group">
                        <strong>Sparepart yang diganti:</strong>
                        <input type="text" name="Sparepart" value="{{ $state->Sparepart }}" class="form-control" placeholder="Sparepart">
                    </div>
                </div>
            @endif

            @if ($isAdmin)
                <div class="col-sm-5 col-md-6">
                    <div class="form-group">
                        <strong>Status:</strong>
                        <select name="Status" class="form-control">
                            <option value="In Progress">In Progress</option>
                            <option value="In Progress">Finish</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                </div>
            @elseif ($isTeknisi)
                <div class="col-sm-5 col-md-6">
                    <div class="form-group">
                        <strong>Status:</strong>
                        <select name="Status" class="form-control">
                            <option value="In Progress">In Progress</option>
                            <option value="Finish">Finish</option>
                        </select>
                    </div>
                </div>
            @elseif ($isUser)
                <div class="col-sm-5 col-md-6">
                    <div class="form-group">
                        <strong>Status:</strong>
                        <select name="Status" class="form-control">
                            <option value="In Progress" disabled>In Progress</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                </div>
            @endif

            @if ($isAdmin || $isTeknisi)
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
            @endif

            @if ($isAdmin || $isUser)
                <div class="col-sm-5 col-md-6">
                    <div class="form-group">
                        <strong>Tanggal Masuk:</strong>
                        <input type="date" name="TglMasuk" value="{{ $state->TglMasuk }}" class="form-control" @disabled(! $isAdmin)>
                    </div>
                </div>
                <div class="col-sm-5 col-md-6">
                    <div class="form-group">
                        <strong>Tanggal Keluar:</strong>
                        <input type="date" name="TglKeluar" value="{{ $state->TglKeluar }}" class="form-control">
                    </div>
                </div>
            @endif

            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
