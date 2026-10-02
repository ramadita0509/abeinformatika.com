<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\TransaksiControllers;
use App\Models\Status;
use App\Models\Teknisi;
use App\Models\Updates;
use Laravel\Scout\Searchable;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $primarykey = 'id';
    protected $fillable = [

        'id_invoice',
        'Invoice',
        'BiayaServis',
        'BiayaPart',
        'HargaModal',
        'BiayaTotal'

    ];

    public static function invoiceFor(Status $status): string
    {
        $nomor = trim((string) $status->Invoice);

        if ($nomor === '') {
            $nomor = str_pad((string) $status->id, 4, '0', STR_PAD_LEFT);
        } elseif (ctype_digit($nomor)) {
            $nomor = str_pad($nomor, 4, '0', STR_PAD_LEFT);
        }

        return 'INV/'.now('Asia/Jakarta')->format('dmY').'/'.$nomor;
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_invoice', 'id');
    }


}
