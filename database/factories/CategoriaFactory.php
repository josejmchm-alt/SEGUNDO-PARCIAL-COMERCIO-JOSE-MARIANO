<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory {
    protected $model = Categoria::class;

    public function definition(): array {
        $nombres = [
            'Electrónica',
            'Hogar',
            'Moda',
            'Belleza',
            'Deportes',
            'Juguetes',
            'Alimentos',
            'Papelería',
            'Salud',
            'Automotriz',
        ];

        return [
            'nombre' => $this->faker->unique()->randomElement($nombres),
            'descripcion' => $this->faker->sentence(),
            'activo' => true,
        ];
    }
}