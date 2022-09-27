<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h5>Laporan Status Periode ({{ $date[0] }} - {{ $date[1] }})</h5>
    <hr>
    <table width="100%" class="table-hover table-bordered">
        <thead>
            <tr>
                <th>No Servis</th>
                <th>No RMA</th>
                <th>Data Customer</th>
                <th>Nama Barang</th>
                <th>Kerusakan</th>
                <th>Biaya</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @forelse ($trx as $row)
            <tr>
                <td><strong>{{ $row->status->Invoice }}</strong></td>
                <td><strong>{{ $row->status->RMA }}</strong></td>
                <td>
                    <strong>{{ $row->status->NamaCustomer }}</strong><br>
                    <label><strong>Telepon:</strong> {{ $row->status->Tlp}}</label><br>
                    <label><strong>Alamat:</strong>{{ $row->status->Alamat }}</label>
                </td>
                <td>
                    <strong>{{ $row->status->NamaBarang }}</strong><br>
                    <label><strong>SN :</strong> {{ $row->status->SerialNumber }}</label><br>
                    <label><strong>Kelengkapan :</strong>{{ $row->status->Kelengkapan }}</label>
                </td>
                <td>
                    <strong>{{ $row->status->Kerusakan }}</strong><br>
                    <label><strong>Remark Teknisi :</strong> {{ $row->status->Remark }}</label><br>
                </td>
                <td>
                    <label><strong>Biaya Part :</strong>Rp. {{ $row->BiayaPart }}</label><br>
                    <label><strong>Biaya Servis :</strong> {{ $row->BiayaServis }}</label><br>
                    <label><strong>Total Biaya :</strong> {{ $row->BiayaTotal }}</label><br>
                </td>
                <td>{{ $row->status->created_at->format('d-m-Y') }}</td>
            </tr>

                {{-- @php $total += $row->subtotal @endphp --}}
            @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                {{-- <td colspan="2">Total</td> --}}
                {{-- <td>Rp {{ number_format($total) }}</td> --}}
                <td></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>