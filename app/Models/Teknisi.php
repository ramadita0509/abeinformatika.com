<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\TeknisiControllers;
use App\Models\Status;
use App\Models\Transaksi;
use App\Models\Updates;
use Laravel\Scout\Searchable;

class Teknisi extends Model
{
    use HasFactory;
    protected $table = 'teknisi';
    protected $primarykey = 'id';
    protected $fillable = [

        'id_invoice',
        'id_updatestatus',
        'NamaTeknisi'

    ];

    public function status()
    {
        return $this->hasOne(Status::class);
    }

 //   public function updates()
  //  {
  //      return $this->belongsTo(Updates::class, 'id_updatestatus', 'id');
 //   }


}
