@extends('layouts.app')

@section('content')
    <h1>Registrar Nuevo Producto</h1>

    @if ($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="categoria_id">Categoría</label>
            <select name="categoria_id" id="categoria_id" class="form-control">
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre del Producto</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}">
        </div>

        <div class="form-group">
            <label for="sku">SKU</label>
            <input type="text" name="sku" id="sku" class="form-control" value="{{ old('sku') }}">
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control" value="{{ old('precio') }}">
        </div>

        <div class="form-group">
            <label for="stock">Stock Inicial</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock') }}">
        </div>

        <button type="submit" class="btn">Guardar Producto</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection