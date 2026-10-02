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
    <h5>Laporan Status {{ $bulan }}</h5>
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
            {{-- @php $total = 0; @endphp --}}
            @forelse ($rows as $row)
            @php $biaya = $row->transaksi->sortByDesc('id')->first(); @endphp
            <tr>
                <td><strong>{{ $row->Invoice }}</strong></td>
                <td><strong>{{ $row->RMA }}</strong></td>
                <td>
                    <strong>{{ $row->NamaCustomer }}</strong><br>
                    <label><strong>Telepon:</strong> {{ $row->Tlp }}</label><br>
                    <label><strong>Alamat:</strong> {{ $row->Alamat }}</label>
                </td>
                <td>
                    <strong>{{ $row->NamaBarang }}</strong><br>
                    <label><strong>SN :</strong> {{ $row->SerialNumber }}</label><br>
                    <label><strong>Kelengkapan :</strong> {{ $row->Kelengkapan }}</label>
                </td>
                <td>
                    <strong>{{ $row->Status }}</strong><br>
                    <label><strong>Kerusakan :</strong> {{ $row->Kerusakan }}</label><br>
                    <label><strong>Remark Teknisi :</strong> {{ $row->Remark }}</label><br>
                </td>
                <td>
                    @if ($biaya)
                    <label><strong>Biaya Part :</strong> Rp. {{ $biaya->BiayaPart }}</label><br>
                    <label><strong>Biaya Servis :</strong> {{ $biaya->BiayaServis }}</label><br>
                    <label><strong>Total Biaya :</strong> {{ $biaya->BiayaTotal }}</label><br>
                    @else
                    <label>Belum ada invoice</label>
                    @endif
                </td>
                <td>{{ $row->TglMasuk }}</td>
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