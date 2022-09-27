<?php

namespace App\Exports;

use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

// class StatusExport implements FromCollection, WithHeadingRow
class StatusExport implements FromCollection, WithHeadingRow
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
   {
        return Status::all();
  }
}
