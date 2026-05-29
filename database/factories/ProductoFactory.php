<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory {
    protected $model = Producto::class;

    public function definition(): array {
        return [
            'nombre' => $this->faker->words(3, true),
            'sku' => strtoupper($this->faker->unique()->bothify('PROD-####-????')), // SKU Único[cite: 6]
            'precio' => $this->faker->randomFloat(2, 10, 1500), // Precios realistas >= 0[cite: 6]
            'stock' => $this->faker->numberBetween(0, 200), // Stock realista >= 0[cite: 6]
            'disponible' => true,
        ];
    }
}