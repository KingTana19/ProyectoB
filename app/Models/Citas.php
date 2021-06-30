<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    protected $table = 'citas';

    protected $fillable = [
        'fecha',
        'hora',
        'descripcion',
        'Costo',
        'estado',
        'usuario_id',
        'servicio_id',
    ];

    public function Servicio()
    {
        return $this->belongsTo(Servicios::class);
    }

    public function Usuario()
    {
        return $this->belongsTo(User::class);
    }
}
