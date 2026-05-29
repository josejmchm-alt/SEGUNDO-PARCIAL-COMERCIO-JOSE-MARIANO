@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1>Catálogo de Productos</h1>
        <a href="{{ route('productos.create') }}" class="btn">Nuevo Producto</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>SKU</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->sku }}</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>{{ $producto->precio }} Bs.</td>
                    <td>{{ $producto->stock }}</td>
                    <td>
                        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-secondary" style="padding: 4px 8px;">Ver</a>
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn" style="padding: 4px 8px; background-color: #ffc107; color: #000;">Editar</a>
                        
                        <!-- Parte 7: Formulario de eliminación con confirmación Javascript -->[cite: 6]
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Está completamente seguro de eliminar este producto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding: 4px 8px;">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection