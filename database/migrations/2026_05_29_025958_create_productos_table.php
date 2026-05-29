<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // bigIncrements
            
            // FK categorias, onDelete cascade
            $table->foreignId('categoria_id')
                  ->constrained('categorias')
                  ->onDelete('cascade'); 
                  
            $table->string('nombre', 150); // Obligatorio
            $table->string('sku', 50)->unique(); // Obligatorio, único
            $table->decimal('precio', 10, 2); // Obligatorio
            $table->integer('stock'); // Obligatorio
            $table->boolean('disponible')->default(true); // Por defecto true
            $table->timestamps(); // created_at / updated_at
        });
    }

    public function down(): void {
        Schema::dropIfExists('productos');
    }
};