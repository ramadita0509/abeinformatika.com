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
              <br><br>
                <div class="float-left">
                  <figure>
                    <img class="logo" src="{{asset('images/abe-informatika2.jpg')}}" alt="">
                  </figure>
                </div>
                <div class="float-right">
                  <h2 class="title">ABE INFORMATIKA</h2>
                  <span>Jl. Ibrahim Adjie No.3a, Indihiang, Kec. Indihiang, Tasikmalaya</span>
                  <span class="line"></span>
                  <a class="phone">(0265) 7520857</a><hr>
                </div>
            </div>
        </div>
        <div class="text center">
          <p><h2 align="center">Tanda Terima Service</h2>
        </div>

        <br><br>
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
        <div class="table third">
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
        </div>
        <div class="row">
          <div class="col-12">
              <div class="float-left">
                  <h5> {{ $state->NamaCustomer}}</h5> <br> <br> <br> <br> <hr>
              </div>
              <div class="float-right">
                <h5> Customer Service</h5> <br> <br> <br> <br> <hr>
              </div>
          </div>
        </div>
      </div>
  </div>
  <br><br>
 <script src="{{ mix('js/app.js') }}"></script>
 <link href="{{asset('css/app.css')}}" rel="stylesheet">

 <br><br>
</body>
</html>

@endsection
<script>window.print();</script>


 {{-- <?php $this->load->view('state.show');?> --}}
