<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encomienda extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_horario',
        'id_emisor',
        'id_receptor',
        'Fecha_Env',
        'Fecha_Rec',
        'Estado',
        'PrecioTotal',
    ];

    // Relación: Una encomienda pertenece a un horario
    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario');
    }

    // Relación: Una encomienda tiene un emisor
    public function emisor()
    {
        return $this->belongsTo(Cliente::class, 'id_emisor');
    }

    // Relación: Una encomienda tiene un receptor
    public function receptor()
    {
        return $this->belongsTo(Cliente::class, 'id_receptor');
    }

    // Relación: Una encomienda tiene muchos detalles
    public function detalles()
    {
        //return $this->hasMany(DetalleEncomienda::class);
        return $this->hasMany(DetalleEncomienda::class, 'id_encomienda', 'id');
    }
}
