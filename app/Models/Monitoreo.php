<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoreo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_minibus',
        'Latitud',
        'Longitud',
    ];

    public function minibus()
    {
        return $this->belongsTo(Minibuse::class, 'id_minibus');
    }
}
