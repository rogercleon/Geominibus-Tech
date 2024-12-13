<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignarMinibuse extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_minibus',
        'id_conductor',
    ];

    public function minibus()
    {
        return $this->belongsTo(Minibuse::class, 'id_minibus');
    }
    public function conductor()
    {
        return $this->belongsTo(Conductore::class, 'id_conductor');
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'id_minibus');
    }
}
