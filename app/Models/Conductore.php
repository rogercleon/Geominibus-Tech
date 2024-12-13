<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductore extends Model
{
    use HasFactory;

    protected $fillable = [
        'Licencia',
        'Nombre',
        'Ap_Paterno',
        'Ap_Materno',
        'Fecha_Nac',
        'Direccion',
        'Telefono',
    ];

    public function asignaciones()
    {
        return $this->hasMany(AsignarMinibuse::class, 'id_conductor');
    }
}
