<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $categorias = [
            ['nombre' => 'Electrónica', 'descripcion' => 'Dispositivos y accesorios tecnológicos', 'activo' => true],
            ['nombre' => 'Hogar', 'descripcion' => 'Artículos para la casa y la cocina', 'activo' => true],
            ['nombre' => 'Moda', 'descripcion' => 'Ropa, calzado y complementos', 'activo' => true],
            ['nombre' => 'Belleza', 'descripcion' => 'Cuidado personal y cosméticos', 'activo' => true],
            ['nombre' => 'Deportes', 'descripcion' => 'Equipo deportivo y accesorios', 'activo' => true],
        ];

        foreach ($categorias as $data) {
            $categoria = Categoria::create($data);
            Producto::factory(4)->create([
                'categoria_id' => $categoria->id
            ]);
        }
    }
}