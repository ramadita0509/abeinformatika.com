<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;

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
        return $this->hasMany(Transaksi::class, 'id_invoice', 'id');
    }

    public static function nextInvoice(): string
    {
        $tertinggi = DB::table('statuses')
            ->lockForUpdate()
            ->selectRaw('MAX(CAST(Invoice AS UNSIGNED)) as nomor')
            ->value('nomor');

        return str_pad((string) (((int) $tertinggi) + 1), 7, '0', STR_PAD_LEFT);
    }

}
