<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'user_id',
        'medicamento',
        'fecha_inicio',
        'duracion_tratamiento',
        'frecuencia_toma'
    ];

    // Relación con el modelo de Usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
