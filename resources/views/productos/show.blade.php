@extends('layouts.app')

@section('content')
    <div class="detail-bubble">
        <div class="detail-header">
            <h1>Detalle Técnico del Recurso</h1>
        </div>

        <div class="detail-grid">
            <div class="detail-item">
                <strong>Identificador Único (ID)</strong>
                <div class="detail-value">{{ $producto->id }}</div>
            </div>

            <div class="detail-item">
                <strong>Nombre comercial</strong>
                <div class="detail-value">{{ $producto->nombre }}</div>
            </div>

            <div class="detail-item">
                <strong>SKU registrado</strong>
                <div class="detail-value">{{ $producto->sku }}</div>
            </div>

            <div class="detail-item">
                <strong>Categoría asociada</strong>
                <div class="detail-value">{{ $producto->categoria->nombre }}</div>
            </div>

            <div class="detail-item">
                <strong>Precio unitario</strong>
                <div class="detail-value">{{ number_format($producto->precio, 2, ',', '.') }} Bs.</div>
            </div>

            <div class="detail-item">
                <strong>Existencias en almacén (Stock)</strong>
                <div class="detail-value">{{ $producto->stock }} unidades</div>
            </div>

            <div class="detail-item">
                <strong>Estado de disponibilidad</strong>
                <div class="detail-value">{{ $producto->disponible ? 'Disponible' : 'Agotado' }}</div>
            </div>
        </div>

        <div class="detail-footer">
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Regresar al catálogo</a>
        </div>
    </div>
@endsection