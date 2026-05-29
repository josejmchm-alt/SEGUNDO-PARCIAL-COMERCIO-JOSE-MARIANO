<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest {

    public function authorize(): bool {
        return true; // Habilitar la autorización de la petición
    }

    public function rules(): array {
        // Ignorar el propio ID del registro actual al actualizar[cite: 6]
        $productoId = $this->route('producto') ? $this->route('producto')->id : null;

        return [
            'nombre' => 'required|string|max:150', // nombre requerido[cite: 6]
            'sku' => 'required|string|max:50|unique:productos,sku,' . $productoId, // sku requerido y único[cite: 6]
            'precio' => 'required|numeric|min:0', // precio numérico >= 0[cite: 6]
            'stock' => 'required|integer|min:0', // stock entero >= 0[cite: 6]
            'categoria_id' => 'required|exists:categorias,id', // categoria_id existente[cite: 6]
            'disponible' => 'nullable|boolean'
        ];
    }
    
    protected function prepareForValidation() {
        $this->merge([
            'disponible' => $this->has('disponible'),
        ]);
    }
}