@extends('layouts.app')

@section('title', 'Show')

@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>Show Data Transaksi</title>
</head>
<body>

<div class="container" id="app">

    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Show Transaksi</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('trx.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @foreach ($trx as $item)
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Invoice:</strong>
                {{ $item->status->Invoice}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Barang:</strong>
                {{ $item->status->NamaBarang}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Serial Number:</strong>
                {{ $item->status->SerialNumber}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Customer:</strong>
                {{ $item->status->NamaCustomer }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Garansi:</strong>
                {{ $item->status->Garansi }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>BiayaServis:</strong>
                {{ $item->BiayaServis }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>BiayaPart:</strong>
                {{ $item->BiayaPart }}
            </div>
        </div>
    </div>
    @endforeach
</div>
</body>
</html>
    {{ $trx->links() }}
@endsection