<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        // Genera al menos 5 categorías y asocia 20 productos[cite: 6]
        Categoria::factory(5)->create()->each(function ($categoria) {
            Producto::factory(4)->create([
                'categoria_id' => $categoria->id
            ]);
        });
    }
}