@extends('layouts.app')

@section('title', 'Show')

@section('content')

<!DOCTYPE html>
<html>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
<head>
	<title>Show Data Servis</title>
   <style>
      table, th, td {
        border: 2px solid black;
        border-collapse: collapse;
      }
      </style>
</head>
<body>
    <div class="container" id="app">
        <div class="row">
            <div class="col-12">
                <div class="float-left">
                    <h2 class="noPrint"> Show Data Servis</h2>
                </div>
                <div class="float-right">
                    <a class="noPrint btn btn-secondary" href="{{ route('state.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <br><br><br>
        <div class="row">
            <div class="col-sm-5 col-md-6">
                <div class="form-group">
                    <strong>No Invoice:</strong>
                    {{ $state->Invoice }}
                </div>
            </div>
            <div class="col-sm-5 col-md-6">
               <div class="form-group">
                   <strong>Nama Customer:</strong>
                   {{ $state->NamaCustomer }}
               </div>
           </div>
           <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Alamat:</strong>
                {{ $state->Alamat}}
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>No Telepon:</strong>
                {{ $state->Tlp }}
            </div>
        </div>
        <div class="col-sm-5 col-md-6">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $state->Email}}
            </div>
        </div>
        <br>
        <div class="table">
               <table style="width:100%" class="table-bordered">
                  <tr>
                    <th>Nama Barang : </th>
                    <td>{{ $state->NamaBarang}}</td>
                  </tr>
                   <tr>
                     <th>Serial Number : </th>
                     <td>{{ $state->SerialNumber}}</td>
                   </tr>
                   <tr>
                     <th>Kerusakan : </th>
                     <td>{{ $state->Kerusakan}}</td>
                   </tr>
                   <tr>
                     <th>Kelengkapan : </th>
                     <td>{{ $state->Kelengkapan}}</td>
                   </tr>
                   <tr>
                     <th>Garansi : </th>
                     <td>{{ $state->Garansi}}</td>
                   </tr>
                   <tr>
                     <th>Sparepart yang diganti : </th>
                     <td>{{ $state->Sparepart}}</td>
                   </tr>
                   <tr>
                     <th>Tanggal Masuk : </th>
                     <td>{{ $state->TglMasuk}}</td>
                   </tr>
                   <tr>
                    <th>Tanggal Diambil : </th>
                    <td>{{ $state->TglKeluar}}</td>
                  </tr>
                </table>
        </div>
            <div class="col-sm-5 col-md-6">
            <div class="form-group">
              <tr>
                <td colspan="2"></td>
                <td colspan="2"><p align="center">{{ $state->NamaCustomer}} <br> <br> <br> <br> <hr></p> </td>
                <td colspan="2"><p align="center">Customer Service <br> <br> <br> <br> <hr></p> </td>
              </tr>
             </div>
        </div>
      </div>
  </div>
 <script src="{{ mix('js/app.js') }}"></script>
 <link href="{{asset('css/app.css')}}" rel="stylesheet">

 <br><br>
</body>
</html>

@endsection
<script>window.print();</script>


 {{-- <?php $this->load->view('state.show');?> --}}
