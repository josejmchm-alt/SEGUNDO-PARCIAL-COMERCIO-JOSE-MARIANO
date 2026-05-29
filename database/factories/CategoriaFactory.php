<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory {
    protected $model = Categoria::class;

    public function definition(): array {
        return [
            'nombre' => $this->faker->unique()->word() . ' ' . $this->faker->randomNumber(3),
            'descripcion' => $this->faker->sentence(),
            'activo' => true,
        ];
    }
}