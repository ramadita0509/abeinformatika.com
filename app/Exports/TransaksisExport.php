<?php

namespace App\Exports;

use App\Models\Transaksi;
use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksisExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
      return Transaksi::select('id','id_invoice','biayaservis','biayapart','hargamodal','biayatotal')->get();
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
