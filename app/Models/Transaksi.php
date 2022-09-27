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
        'BiayaServis',
        'BiayaPart',
        'HargaModal',
        'BiayaTotal'

    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_invoice', 'id');
    }


}
