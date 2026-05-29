@extends('layouts.app')

@section('content')
    <div class="page-card">
        <h1 class="section-title">Catálogo de Productos</h1>
        <p class="section-subtitle">Explora los productos disponibles con acciones rápidas y un estilo moderno.</p>
    </div>

    <div class="product-grid">
        @foreach($productos as $producto)
            <div class="product-card">
                <div class="product-card-header">
                    <span class="badge">{{ $producto->categoria->nombre }}</span>
                    <span class="product-sku">{{ $producto->sku }}</span>
                </div>

                <div class="product-card-body">
                    <h2>{{ $producto->nombre }}</h2>
                    <p class="product-price">{{ number_format($producto->precio, 2, ',', '.') }} Bs.</p>
                    <p class="product-stock">{{ $producto->stock }} unidades disponibles</p>
                </div>

                <div class="product-card-actions">
                    <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-secondary btn-small">Ver</a>
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-small">Editar</a>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline-form" onsubmit="return confirm('¿Está completamente seguro de eliminar este producto?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-small">Eliminar</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection