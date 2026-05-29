<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model {
    use HasFactory;

    protected $fillable = ['categoria_id', 'nombre', 'sku', 'precio', 'stock', 'disponible'];

    protected $casts = [
        'precio' => 'decimal:2', // Cast a decimal
        'stock' => 'integer',
        'disponible' => 'boolean', // Cast a boolean
    ];

    // Un Producto pertenece a una sola categoría (belongsTo)
    public function categoria(): BelongsTo {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }
}