@extends('layouts.app')

@section('title', 'Show')

@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>Show Data Servis</title>
   <style>
      table, th, td {
        border: 1px solid black;
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
                    <a class="btn btn-secondary" href="{{ route('state.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <br><br><br>
        <div class="row">
            <div class="col-sm-5 col-md-6">
                <div class="form-group">
                    <strong>No Invoice:</strong>
                    {{ $state->id }}
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
               <table style="width:100%">
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
                     <th>Estimasi Biaya : </th>
                     <td>{{ $state->EstimasiBiaya}}</td>
                   </tr>
                   <tr>
                     <th>Tanggal Masuk : </th>
                     <td>{{ $state->TglMasuk}}</td>
                   </tr>
                </table>
        </div>
            <div class="col-sm-5 col-md-6">
            <div class="form-group">
                  <strong>Nama Penerima </strong>
                  {{ $state->Email}}
            </div>
            <br><br><br><br><br>

            <h3><strong>______________</strong></h3>


              <a href="{{ route('nota') }}" ><i class="fa fa-print"></i> Print</a>
    </div>
</div>

 <script src="{{ mix('js/app.js') }}"></script>

 <br><br>
</body>
</html>

@endsection
<script>window.print();</script>


{{-- <!DOCTYPE html>
<html>
<head>

<body>
	<div class="container">
		<center><h3><em>TANDA TERIMA SERVIS</em></h3></center>
	</div>

	<div class="inputan">
		<div class="container">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<img src="#" alt="">
			</div>

			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<table width="329">
				  <tr>
				    <td width="90" ><font size="4"><B>Nama</B></td>
				    <td width="194">: <font size="4"><input style="border:none" type="text"  name="nmpemilik" value="#" readonly></td>
				  </tr>
				  <tr>
				    <td><font size="4"><B>Alamat</B></td>
				    <td>: <font size="4"><input style="border:none" type="text" name="alamat" value="#" readonly></td><br>
				  </tr>
				  <tr>
				    <td ><font size="4"><B>Telp.</B></td>
				    <td >: <font size="4"><input style="border:none"  type="text"  value="#" readonly></td>
				  </tr>
				</table>
			</div>

			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<table width="329">
				  <tr>
				    <td width="90"><font size="4"><B>NOTA</B></td>
				    <td width="194">: <font size="4"><input style="border:none" type="text"  name="nota" value="#" readonly></td>
				  </tr>
				  <tr>
				    <td><font size="4"><B>Tgl. Masuk</B></td>
				    <td>: <font size="4"><input style="border:none" type="date" name="tglditerima" value="#</td><br>
				  </tr>

				</table>
			</div>
		</div>
	</div>

	<div class="tabel">
		<div class="container">
			<br><table width="100%" border="4">
			  <tr>
			    <th><center>
			      <strong>NAMA BARANG</strong>
			    </center></th>
			    <th><center>
			      <strong>KERUSAKAN</strong>
			    </center></th>
			    <th><center>
			      <strong>KELENGKAPAN</strong>
			    </center></th>
			  </tr>

			  <tr>
			    <td height="180" valign="top"> <font size="4"><input style="border:none" type="text"  name="nmbarang" value=" #" readonly></td>
			    <td valign="top"> <font size="4"><input style="border:none" type="text"  name="kerusakan" value=" #" readonly></td>
			    <td valign="top"> <font size="4"><input style="border:none" type="text"  name="kelengkapan" value=" #" readonly></td>
			  </tr>
			</table>
		</div>
	</div>

	<div class="keterangan">
		<div class="container">
			<center><img src="#" alt=""></center>
		</div>
	</div>

	<div class="bawah">
		<div class="container">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

			</div>

			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

			</div>

			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<center><table width="120" >
					  <tr>
					    <td width="101" height="35"><center><h3><strong>PENERIMA</strong></h3></center></td>
					  </tr>
					  <tr>
					    <td width="101" height="35"></td>
					  </tr>
					  <tr>
					    <td width="101" height="35"><h3><strong>______________</strong></h3></td>
					  </tr>
					  <tr><td><font size="4"><input type="text" style="border:none"  name="penerimabarang" value="ID PENERIMA: #" readonly></td></tr>
				</table></center>
			</div>
		</div>
	</div>

</body>
</html>

 {{-- <?php $this->load->view('state.show');?> --}}


