<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEncomienda extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_encomienda',
        'Descripcion',
        'Cantidad',
        'Largo',
        'Ancho',
        'Alto',
        'Precio',
    ];

    public function encomienda()
    {
        //return $this->belongsTo(Encomienda::class);
        return $this->belongsTo(Encomienda::class, 'id_encomienda', 'id');
    }
}
