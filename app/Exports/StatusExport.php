<?php

namespace App\Exports;

use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

// class StatusExport implements FromCollection, WithHeadingRow
class StatusExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
   {
      // return Status::all();
      return Status::select('id','invoice','rma','namabarang','serialnumber','namacustomer','alamat','tlp','email','kerusakan','kelengkapan','ket','garansi','sparepart','status','namateknisi','remark','tglmasuk','tglkeluar')->get();
   }
   public function headings(): array
    {
      return [
        'id',
        'Invoice',
        'RMA',
        'NamaBarang',
        'SerialNumber',
        'NamaCustomer',
        'Alamat',
        'Tlp',
        'Email',
        'Kerusakan',
        'Kelengkapan',
        'Ket',
        'Garansi',
        'Sparepart',
        'Status',
        'NamaTeknisi',
        'Remark',
        'TglMasuk',
        'TglKeluar'
      ];
   }
}
