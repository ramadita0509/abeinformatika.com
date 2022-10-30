<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
	{{-- <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'> --}}
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

	<!-- <link rel="stylesheet" href="sass/main.css" media="screen" charset="utf-8"/> -->
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta http-equiv="content-type" content="text-html; charset=utf-8">
	<style type="text/css">
		i{
            font-size: 50px !important;
            padding: 10px;
        }
	html, body, div, span, applet, object, iframe,
		h1, h2, h3, h4, h5, h6, p, blockquote, pre,
		a, abbr, acronym, address, big, cite, code,
		del, dfn, em, img, ins, kbd, q, s, samp,
		small, strike, strong, sub, sup, tt, var,
		b, u, i, center,
		dl, dt, dd, ol, ul, li,
		fieldset, form, label, legend,
		table, caption, tbody, tfoot, thead, tr, th, td,
		article, aside, canvas, details, embed,
		figure, figcaption, footer, header, hgroup,
		menu, nav, output, ruby, section, summary,
		time, mark, audio, video {
			margin: 0;
			padding: 0;
			border: 0;
			font: inherit;
			font-size: 100%;
			vertical-align: baseline;
		}

		html {
			line-height: 1;
		}

		ol, ul {
			list-style: none;
		}

		table {
			border-collapse: collapse;
			border-spacing: 0;
		}

		caption, th, td {
			text-align: left;
			font-weight: normal;
			vertical-align: middle;
		}

		q, blockquote {
			quotes: none;
		}
		q:before, q:after, blockquote:before, blockquote:after {
			content: "";
			content: none;
		}

		a img {
			border: none;
		}

		article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
			display: block;
		}

		body {
			font-family: 'Source Sans Pro', sans-serif;
			font-weight: 300;
			font-size: 12px;
			margin: 0;
			padding: 0;
			color: #777777;
		}
		body a {
			text-decoration: none;
			color: inherit;
		}
		body a:hover {
			color: inherit;
			opacity: 0.7;
		}
		body .container {
			min-width: 500px;
			margin: 0 auto;
			padding: 0 30px;
			font-size: 15px;
			font-weight: 300;
		}
		body .clearfix:after {
			content: "";
			display: table;
			clear: both;
		}
		body .left {
			float: left;
		}
		body .right {
			float: right;
		}
		body .helper {
			height: 100%;
		}
		section .status {
			font-family: 'Source Sans Pro', sans-serif;
			font-weight: 300;
			font-size: 12px;
			margin: 0;
			padding: 0;
		}

		header {
			height: 40px;
			margin-top: 20px;
			margin-bottom: 40px;
			padding: 0px 5px 0;
		}
		header figure {
			float: left;
			width: 40px;
			margin-right: 60px;
		}
		header figure img {
			height: 40px;
		}
		header .company-info {
			color: #BDB9B9;
		}
		header .company-info .title {
			margin-bottom: 5px;
			color: #2A8EAC;
			font-weight: 600;
			font-size: 2em;
		}
		header .company-info .line {
			display: inline-block;
			height: 9px;
			margin: 0 4px;
			border-left: 1px solid #2A8EAC;
		}

		section .details {
			min-width: 500px;
			margin-bottom: 40px;
			padding: 10px 35px;
			background-color: #2A8EAC;
			color: #ffffff;
		}
		section .details .client {
			width: 50%;
			line-height: 16px;
			font-size: 13px;
			margin-top: 1px
		}
		section .details .client .name {
			font-weight: 600;
		}
		section .details .data {
			width: 50%;
			text-align: right;
			font-size: 13px;
		}
		section .details .title {
			margin-bottom: 15px;
			font-size: 2.5em;
			font-weight: 400;
			text-transform: uppercase;
		}
		section .table-wrapper {
			position: relative;
			overflow: hidden;
		}
		section .table-wrapper:before {
			content: "";
			display: block;
			position: absolute;
			top: 33px;
			left: 30px;
			width: 90%;
			height: 100%;
			border-top: 2px solid #BDB9B9;
			border-left: 2px solid #BDB9B9;
			z-index: -1;
		}
		section .no-break {
			page-break-inside: avoid;
		}
		section table {
			width: 100%;
			margin-bottom: -20px;
			table-layout: fixed;
			border-collapse: separate;
			border-spacing: 5px 20px;
		}
		section table .no {
			width: 50px;
		}
		section table .desc {
			width: 55%;
		}
		section table .qty, section table .unit, section table .total {
			width: 15%;
		}
		section table tbody.head {
			vertical-align: middle;
			border-color: inherit;
		}
		section table tbody.head th {
			text-align: center;
			color: white;
			font-weight: 600;
			text-transform: uppercase;
		}
		section table tbody.head th div {
			display: inline-block;
			padding: 7px 0;
			width: 100%;
			background: #BDB9B9;
		}
		section table tbody.head th.desc div {
			width: 115px;
			margin-left: -110px;
		}
		section table tbody.body td {
			padding: 10px 5px;
			background: #F3F3F3;
			text-align: center;
		}
		section table tbody.body h3 {
			margin-bottom: 5px;
			color: #2A8EAC;
			font-weight: 600;
		}
		section table tbody.body .no {
			padding: 0px;
			background-color: #2A8EAC;
			color: #ffffff;
			font-size: 1.66666666666667em;
			font-weight: 600;
			line-height: 50px;
		}
		section table tbody.body .desc {
			padding-top: 0;
			padding-bottom: 0;
			background-color: transparent;
			color: #777787;
			text-align: left;
		}
		section table tbody.body .total {
			color: #2A8EAC;
			font-weight: 600;
		}
		section table tbody.body tr.total td {
			padding: 5px 10px;
			background-color: transparent;
			border: none;
			color: #777777;
			text-align: right;
		}
		section table tbody.body tr.total .empty {
			background: white;
		}
		section table tbody.body tr.total .total {
			font-size: 1.18181818181818em;
			font-weight: 600;
			color: #2A8EAC;
		}
		section table.grand-total {
			margin-top: 40px;
			margin-bottom: 0;
			border-collapse: collapse;
			border-spacing: 0px 0px;
			margin-bottom: 40px;
		}
		section table.grand-total tbody td {
			padding: 0 10px 10px;
			background-color: #2A8EAC;
			color: #ffffff;
			font-weight: 400;
			text-align: right;
		}
		section table.grand-total tbody td.no, section table.grand-total tbody td.desc, section table.grand-total tbody td.qty {
			background-color: transparent;
		}
		section table.grand-total tbody td.total, section table.grand-total tbody td.grand-total {
			border-right: 5px solid #ffffff;
		}
		section table.grand-total tbody td.grand-total {
			padding: 0;
			font-size: 1.16666666666667em;
			font-weight: 600;
			background-color: transparent;
		}
		section table.grand-total tbody td.grand-total div {
			float: right;
			padding: 10px 5px;
			background-color: #21BCEA;
		}
		section table.grand-total tbody td.grand-total div span {
			margin-right: 5px;
		}
		section table.grand-total tbody tr:first-child td {
			padding-top: 10px;
		}

		footer {
			margin-bottom: 20px;
			padding: 0 5px;
		}
		footer .thanks {
			margin-bottom: 0px;
			color: #2A8EAC;
			font-size: 1.16666666666667em;
			font-weight: 600;
		}
		footer .noPrint {
			margin-left: 1000px;
			margin-top: 0px;
			color: #2A8EAC;
			font-size: 1.16666666666667em;
			font-weight: 600;
		}
		footer .notice {
			margin-bottom: 25px;
			color: #050505;
			font-size: 1em;
			font-style: italic;
			font-weight: bold;
		}
		footer .end {
			padding-top: 5px;
			border-top: 2px solid #2A8EAC;
			text-align: center;
		}
		@media print {
		.noPrint{
		display:none;
		}
		footer .btn {
		display: inline-block;
		font-weight: 400;
		color: #212529;
		text-align: center;
		vertical-align: middle;
		-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
				user-select: none;
		background-color: transparent;
		border: 1px solid transparent;
		padding: 0.375rem 0.75rem;
		font-size: 0.9rem;
		line-height: 1.6;
		border-radius: 0.25rem;
		transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
		}
		@media (prefers-reduced-motion: reduce) {
		.btn {
			transition: none;
		}
		}
		.btn-success {
  color: #fff;
  background-color: #1cc88a;
  border-color: #1cc88a;
}

.btn-success:hover {
  color: #fff;
  background-color: #17a673;
  border-color: #169b6b;
}

.btn-success:focus, .btn-success.focus {
  color: #fff;
  background-color: #17a673;
  border-color: #169b6b;
  box-shadow: 0 0 0 0.2rem rgba(62, 208, 156, 0.5);
}

.btn-success.disabled, .btn-success:disabled {
  color: #fff;
  background-color: #1cc88a;
  border-color: #1cc88a;
}

.btn-success:not(:disabled):not(.disabled):active, .btn-success:not(:disabled):not(.disabled).active,
.show > .btn-success.dropdown-toggle {
  color: #fff;
  background-color: #169b6b;
  border-color: #149063;
}

.btn-success:not(:disabled):not(.disabled):active:focus, .btn-success:not(:disabled):not(.disabled).active:focus,
.show > .btn-success.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(62, 208, 156, 0.5);
}

.btn-info {
  color: #fff;
  background-color: #36b9cc;
  border-color: #36b9cc;
}
		.btn-info {
		color: #fff;
		background-color: #17a2b8;
		border-color: #17a2b8;
		}
		.btn-info:hover {
		color: #fff;
		background-color: #138496;
		border-color: #117a8b;
		}
		.btn-info:focus, .btn-info.focus {
		color: #fff;
		background-color: #138496;
		border-color: #117a8b;
		box-shadow: 0 0 0 0.2rem rgba(58, 176, 195, 0.5);
		}
		.btn-info.disabled, .btn-info:disabled {
		color: #fff;
		background-color: #17a2b8;
		border-color: #17a2b8;
		}
		.btn-info:not(:disabled):not(.disabled):active, .btn-info:not(:disabled):not(.disabled).active, .show > .btn-info.dropdown-toggle {
		color: #fff;
		background-color: #117a8b;
		border-color: #10707f;
		}


		.btn-sm, .btn-group-sm > .btn {
		padding: 0.25rem 0.5rem;
		font-size: 0.7875rem;
		line-height: 1.5;
		border-radius: 0.2rem;
		}


		input[type=submit].btn-block,
		input[type=reset].btn-block,
		input[type=button].btn-block {
		width: 100%;
		}
		}
		.float-right {
		float: right !important;
		margin-bottom:50px
		}
		.float-left {
		float: left !important;
		}

		.float-none {
		float: none !important;
		}


	</style>
</head>

<body>
	<header class="clearfix">
		<div class="container">
			<figure>
				<img class="logo" src="{{asset('images/abe-informatika2.jpg')}}" alt="">
			</figure>
			<div class="company-info">
				<h2 class="title">CV.ABE INFORMATIKA</h2>
				<span>Jl. Ibrahim Adjie No.3a, Indihiang, Kec. Indihiang, Tasikmalaya</span>
				<span class="line"></span>
				Tlp: (0265) 7520857
				<div class="float-right noPrint">
					<a class="btn btn-success" href="{{ route('trx.index') }}"> Back </a>
				</div>
			</div>
        </div>
	</header>
	<section>

		<div class="details clearfix">
			<div class="client left">
				<p>INVOICE TO:</p>
				<p class="name">{{ $trx->status->NamaCustomer}}</p>
				{{ $trx->status->Alamat}}<br>
				<p><a href="mailto:{{ $trx->status->Email}}">{{ $trx->status->Email}}</a></p><br>
				<p> No Service : {{ $trx->status->Invoice }}</p>
			</div>
			<div class="data right">
				<div class="title"> {{ $trx->Invoice }}</div>
				<div class="date">
					Date of Invoice: {{ $trx->status->TglKeluar}}<br>
					Due Date: 30 Hari dari {{ $trx->status->TglKeluar}}
				</div>

			</div>
		</div>

		<div class="container">
            <div class="body">
                <h2> {{ $trx->status->NamaBarang}} | SN : {{ $trx->status->SerialNumber}} </h2>
                </div>
			<div class="table-wrapper">
				<table>
					<tbody class="head">
						<tr>
							<th class="no"></th>
							<th class="desc"><div>Nama</div></th>
							<th class="qty"><div>Deskripsi</div></th>
							<th class="total"><div>Biaya</div></th>
						</tr>
					</tbody>
					<tbody class="body">
						<tr>
							<td class="no">01</td>
							<td class="desc">Sparepart yang diganti</td>
							<td class="qty">{{ $trx->status->Sparepart}}</td>
							<td class="total">{{ $trx->BiayaPart }}</td>
						</tr>
						<tr>
							<td class="no">02</td>
							<td class="desc">Biaya Jasa</td>
							<td class="qty"></td>
							<td class="total">{{ $trx->BiayaServis}}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="no-break">
				<table class="grand-total">
					<tbody>
						{{-- <tr>
							<td class="no"></td>
							<td class="desc"></td>
							<td class="qty"></td>
							<td class="unit">SUBTOTAL:</td>
							<td class="total">{{ $trx->BiayaTotal}}</td>
						</tr>
						<tr>
							<td class="no"></td>
							<td class="desc"></td>
							<td class="qty"></td>
							<td class="unit">AX 25%:</td>
							<td class="total">$1,300.00</td>
						</tr> --}}
						<tr>
							<td class="grand-total" colspan="5"><div><span>GRAND TOTAL:</span>{{ $trx->BiayaTotal}}</div></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>


	<footer>
		<div class="container">
			<div class="thanks">Thank you!</div>
			<div class="noPrint"><a href="" button onclick="window.print()" target="_blank" class="btn btn-sm btn-info">Print </a></div>
			<div class="notice">
				<b>Note:</b>
				<div>Barang yang sudah dibeli tidak dapat ditukar lagi.</div>
			</div>
			<div class="end">Invoice was created on a computer and is valid without the signature and seal.</div>
		</div>
	</footer>

</body>

</html>

