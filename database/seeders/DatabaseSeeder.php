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

        $nombresPorCategoria = [
            'Electrónica' => [
                'Teléfono inteligente de última generación',
                'Auriculares Bluetooth con cancelación de ruido',
                'Cámara compacta 4K con estabilización',
                'Cargador portátil de alta capacidad'
            ],
            'Hogar' => [
                'Set de ollas antiadherentes premium',
                'Cafetera espresso automática',
                'Juego de toallas suaves de algodón',
                'Lámpara de mesa LED regulable'
            ],
            'Moda' => [
                'Chaqueta urbana elegante',
                'Zapatillas deportivas de running',
                'Bolso de cuero estilo casual',
                'Vestido de verano estampado'
            ],
            'Belleza' => [
                'Crema hidratante facial nutritiva',
                'Perfume floral intenso',
                'Set de maquillaje profesional',
                'Mascarilla revitalizante para piel seca'
            ],
            'Deportes' => [
                'Balón de fútbol profesional',
                'Mochila de senderismo resistente',
                'Reloj deportivo GPS con pulsómetro',
                'Saco de boxeo para entrenamiento en casa'
            ],
        ];

        foreach ($categorias as $data) {
            $categoria = Categoria::create($data);
            $nombres = $nombresPorCategoria[$categoria->nombre] ?? [];

            foreach ($nombres as $nombre) {
                Producto::factory()->create([
                    'categoria_id' => $categoria->id,
                    'nombre' => $nombre,
                ]);
            }
        }
    }
}