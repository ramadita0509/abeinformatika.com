<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\StatusControllers;
use App\Models\Transaksi;
use App\Models\Teknisi;
use App\Models\Updates;

class Status extends Model
{
    use HasFactory;
    protected $table = 'statuses';
    protected $primarykey = 'id';
    protected $fillable = [

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
        'TglKeluar',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

}
