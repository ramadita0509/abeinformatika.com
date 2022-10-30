@extends('layouts.app')

@section('title', 'Edit')

@section('content')

<div class="container" id="app">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Transaksi</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('trx.index') }}"> Back</a>
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

    <form action="{{ route('trx.update',$trx->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Service:</strong>
                <input type="text" name="id_invoice" class="form-control" placeholder="No Invoice" value="{{ $trx->id_invoice }}" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Invoice:</strong>
                <input type="text" name="Invoice" class="form-control" placeholder="No Invoice" value="{{ $trx->Invoice }}" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Biaya Servis:</strong>
                <input type="number" name="BiayaServis" value="{{ $trx->BiayaServis }}" class="form-control" id="BiayaServis" onkeyup="sum()" placeholder="Biaya Service">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Biaya Sparepart:</strong>
                <input type="number" name="BiayaPart" value="{{ $trx->BiayaPart }}" class="form-control" id="BiayaPart" onkeyup="sum()" placeholder="Biaya Sparepart">
            </div>
        </div>
        @hasrole('admin')
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Modal:</strong>
                <input type="number" name="HargaModal" value="{{ $trx->HargaModal }}" class="form-control" id="HargaModal" onkeyup="sum()" placeholder="Harga Modal">
            </div>
        </div>
        @endhasrole
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Biaya Total:</strong>
                <input type="number" name="BiayaTotal" value="{{ $trx->TotalBiaya }}" class="form-control" id="BiayaTotal" onkeyup="sum()" placeholder="Total Biaya">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

    </form>
</div>
{{-- @hasrole('admin')
<script>
    function sum() {
       var txtFirstNumberValue = document.getElementById('BiayaServis').value;
       var txtSecondNumberValue = document.getElementById('BiayaPart').value;
       var txtThirdNumberValue = document.getElementById('HargaModal').value;
       if (txtFirstNumberValue == "")
           txtFirstNumberValue = 0;
       if (txtSecondNumberValue == "")
           txtSecondNumberValue = 0;
       if (txtThirdNumberValue == "")
           txtThirdNumberValue = 0;

       var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue) + parseInt(txtThirdNumberValue);
       if (!isNaN(result)) {
           document.getElementById('BiayaTotal').value = result;
       }
   }
</script>
@endhasrole --}}
@hasrole('user')
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
@endhasrole
@endsection