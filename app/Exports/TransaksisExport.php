<?php

namespace App\Exports;

use App\Models\Transaksi;
use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksisExport implements FromCollection, WithHeadings
{
    public function __construct(private string $bulan)
    {
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
      [$year, $month] = explode('-', $this->bulan);

      return Transaksi::query()
        ->select('id','id_invoice','biayaservis','biayapart','hargamodal','biayatotal')
        ->whereYear('created_at', $year)
        ->whereMonth('created_at', $month)
        ->orderBy('created_at')
        ->get();
    }

    public function headings(): array
    {
        return [
        'id',
        'id_invoice',
        'BiayaServis',
        'BiayaPart',
        'HargaModal',
        'BiayaTotal'
        ];
    }
}
