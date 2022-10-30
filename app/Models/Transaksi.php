<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\TransaksiControllers;
use App\Models\Status;
use App\Models\Teknisi;
use App\Models\Updates;
use Laravel\Scout\Searchable;
use DB;

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

    public static function Invoice()
    {
    	$Invoice = DB::table('transaksis')->max('Invoice');
    	$addNol = '';
    	$Invoice = str_replace("INV/".date('dmY').'/', "", $Invoice);
    	$Invoice = (int) $Invoice + 1;
        $incrementInvoice = $Invoice;

    	if (strlen($Invoice) == 1) {
    		$addNol = "000";
    	} elseif (strlen($Invoice) == 2) {
    		$addNol = "00";
    	} elseif (strlen($Invoice == 3)) {
    		$addNol = "0";
    	}

    	$InvoiceBaru = "INV/".date('dmY').'/'.$addNol.$incrementInvoice;
    	return $InvoiceBaru;
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_invoice', 'id');
    }


}
