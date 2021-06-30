<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $fillable = [
        'Nombre',
        'Codigo',
        'Descripcion',
        'Costo',
        'categoria_id',
        'imagen',
        'estado'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class);
    }
}
