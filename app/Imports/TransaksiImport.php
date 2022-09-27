<?php

namespace App\Imports;

use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransaksiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $trx = new Transaksi([
            "id_invoice" => $row['id_invoice'],
            "BiayaServis" => $row['biayaservis'],
            "BiayaPart" => $row['biayapart'],
            "HargaModal" => $row['hargamodal'],
            "BiayaTotal" => $row['biayatotal']
        ]);

        // Delete Any Existing Role
        DB::table('transaksis')->where('id',$trx->id)->delete();

        // Assign Role To User
      //  $user->assignRole($user->role_id);

        return $trx;
    }
}
