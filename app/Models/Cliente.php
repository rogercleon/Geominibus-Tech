<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'CI',
        'Nombre',
        'Ap_Paterno',
        'Ap_Materno',
        'Fecha_Nac',
        'Direccion',
        'Telefono',
        'Correo',
    ];

    public function boletos()
    {
        return $this->hasMany(Boleto::class, 'id_cliente');
    }

    // Relación: Un cliente puede ser emisor de muchas encomiendas
    public function emisores()
    {
        return $this->hasMany(Encomienda::class, 'id_emisor');
    }

    // Relación: Un cliente puede ser receptor de muchas encomiendas
    public function receptores()
    {
        return $this->hasMany(Encomienda::class, 'id_receptor');
    }
}
