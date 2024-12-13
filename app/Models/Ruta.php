<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $fillable = [
        'Origen',
        'Destino',
        'Precio',
    ];

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'id_ruta');
    }
}
