<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\UpdateControllers;
use App\Models\Status;
use App\Models\Teknisi;
use Laravel\Scout\Searchable;

class Updates extends Model
{
    use HasFactory;
    protected $table = 'update';
    protected $primarykey = 'id';
    protected $fillable = [

        'id_updatestatus',
        'UpdateStatus'

    ];

    public function status()
    {
        return $this->hasOne(Status::class);
    }

    public function teknisi()
    {
        return $this->hasMany(Teknisi::class);
    }


}
