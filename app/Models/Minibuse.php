<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minibuse extends Model
{
    use HasFactory;

    protected $fillable = [
        'Num_Minibus',
        'Num_Asientos',
        'Num_Chasis',
        'Placa',
    ];

    public function asignaciones()
    {
        return $this->hasMany(AsignarMinibuse::class, 'id_minibus');
    }

    public function monitoreos()
    {
        return $this->hasMany(Monitoreo::class, 'id_minibus');
    }
}
