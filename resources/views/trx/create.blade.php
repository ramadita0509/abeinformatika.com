@extends('layouts.app')

@section('title', 'Create')

@section('content')

<div class="container" id="app">
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Data Transaksi</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('trx.index') }}"> Kembali</a>
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

<form action="{{ route('trx.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Servis:</strong>
            <select class="form-control select2" style="width: 100;" name="id_invoice" id="id_invoice">
                <option disabled value> Pilih No Servis </option>
                @foreach ($state as $item)
                <option value="{{ $item->id }}"> {{ $item->Invoice}}</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Invoice:</strong>
                <input class="form-control" placeholder="Invoice" name="Invoice" type="text" value="{{ $Invoice }}" id="Invoice" readonly>
                {!! $errors->first('Invoice', "<p class='invalid-feedback'>:message</p>") !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Biaya Servis:</strong>
                <input type="number" name="BiayaServis" class="form-control" id="BiayaServis" onkeyup="sum()" placeholder="Biaya Servis">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Biaya Sparepart:</strong>
                <input type="number" name="BiayaPart" class="form-control" id="BiayaPart" onkeyup="sum()" placeholder="Biaya Sparepart">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Biaya Total:</strong>
                <input type="number" name="BiayaTotal" class="form-control" id="BiayaTotal" onkeyup="sum()" placeholder="Biaya Total" readonly>
            </div>
        </div>
    </div>
    <br>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>

<script>
    function sum() {
       var txtFirstNumberValue = document.getElementById('BiayaServis').value;
       var txtSecondNumberValue = document.getElementById('BiayaPart').value;
       if (txtFirstNumberValue == "")
           txtFirstNumberValue = 0;
       if (txtSecondNumberValue == "")
           txtSecondNumberValue = 0;

       var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
       if (!isNaN(result)) {
           document.getElementById('BiayaTotal').value = result;
       }
   }
</script>
@endsection