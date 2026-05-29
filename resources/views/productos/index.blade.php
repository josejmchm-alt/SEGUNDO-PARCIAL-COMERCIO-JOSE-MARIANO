@extends('layouts.app')

@section('content')
    <div class="page-card">
        <h1 class="section-title">Catálogo de Productos</h1>
        <p class="section-subtitle">Explora los productos disponibles con acciones rápidas y un estilo moderno.</p>
        <div class="category-menu">
            <button id="clear-filter" class="category-chip active" data-category="">Todas</button>
            @foreach($categorias as $categoria)
                <button class="category-chip" data-category="{{ $categoria->nombre }}">{{ $categoria->nombre }}</button>
            @endforeach
        </div>
    </div>

    <div class="product-grid">
        @php
            $palette = ['#7c3aed', '#0ea5e9', '#fb7185', '#f97316', '#22c55e', '#818cf8', '#8b5cf6'];
        @endphp
        @foreach($productos as $producto)
            @php
                $color = $palette[$loop->index % count($palette)];
            @endphp
            <div class="product-card" data-name="{{ $producto->nombre }}" data-sku="{{ $producto->sku }}" data-category="{{ $producto->categoria->nombre }}" style="border-color: {{ $color }}22; box-shadow: 0 18px 40px {{ $color }}25;">
                <div class="product-card-header">
                    <span class="badge" style="background: {{ $color }};">{{ $producto->categoria->nombre }}</span>
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