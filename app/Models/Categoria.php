<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model {
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'activo']; // Asignación masiva

    protected $casts = [
        'activo' => 'boolean', // Casts apropiados
    ];

    // Una Categoría agrupa muchos productos (hasMany)
    public function productos(): HasMany {
        return $this->hasMany(Producto::class, 'categoria_id', 'id');
    }
}