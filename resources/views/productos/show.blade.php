@extends('layouts.app')

@section('content')
    <h1>Detalle Técnico del Recurso</h1>
    
    <div style="margin-top: 20px; line-height: 1.8;">
        <p><strong>Identificador Único (ID):</strong> {{ $producto->id }}</p>
        <p><strong>Nombre comercial:</strong> {{ $producto->nombre }}</p>
        <p><strong>SKU registrado:</strong> {{ $producto->sku }}</p>
        <p><strong>Categoría asociada:</strong> {{ $producto->categoria->nombre }}</p>
        <p><strong>Precio unitario:</strong> {{ $producto->precio }} Bs.</p>
        <p><strong>Existencias en almacén (Stock):</strong> {{ $producto->stock }} unidades</p>
        <p><strong>Estado de disponibilidad:</strong> {{ $producto->disponible ? 'Disponible' : 'Agotado' }}</p>
    </div>

    <div style="margin-top: 25px;">
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Regresar al catálogo</a>
    </div>
@endsection