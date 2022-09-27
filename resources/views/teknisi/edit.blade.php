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
                <a class="btn btn-secondary" href="{{ route('teknisi.index') }}"> Back</a>
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

    <form action="{{ route('teknisi.update',$teknisi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">

                <strong>No Invoice:</strong>
                <input type="text" name="id_invoice" class="form-control" placeholder="No Invoice" value="{{ $teknisi->id_invoice }}" >

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Teknisi:</strong>
                <input type="text " name="NamaTeknisi" value="{{ $teknisi->NamaTeknisi }}" class="form-control" placeholder="Nama Teknisi">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

    </form>
</div>
@endsection