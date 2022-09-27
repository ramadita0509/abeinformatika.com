<?php

namespace App\Imports;

use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StatusesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Status([
            "Invoice" => $row['invoice'],
            "RMA" => $row['rma'],
            "NamaBarang" => $row['namabarang'],
            "SerialNumber" => $row['serialnumber'],
            "NamaCustomer" => $row['namacustomer'],
            "Alamat" => $row['alamat'],
            "Tlp" => $row['tlp'],
            "Email" => $row['email'],
            "Kerusakan" => $row['kerusakan'],
            "Kelengkapan" => $row['kelengkapan'],
            "Ket" => $row['ket'],
            "Garansi" => $row['garansi'],
            "Sparepart" => $row['sparepart'],
            "Status" => $row['status'],
            "NamaTeknisi" => $row['namateknisi'],
            "Remark" => $row['remark'],
            "TglMasuk" => $row['tglmasuk'],
            "TglKeluar" => $row['tglkeluar'],

        ]);



        // Delete Any Existing Role
       DB::table('statuses')->where('id',$state->id)->delete();

        // Assign Role To User
     //  $state->assignRole($user->role_id);

        return $state;
    }
}
