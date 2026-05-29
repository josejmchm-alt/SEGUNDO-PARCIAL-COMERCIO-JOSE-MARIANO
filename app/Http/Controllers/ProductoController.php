<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Http\Requests\ProductoRequest; // Usado en la Parte 5[cite: 6]

class ProductoController extends Controller {

    public function index() {
        // Carga los productos con su categoría usando eager loading para evitar N+1[cite: 6]
        $productos = Producto::with('categoria')->latest()->get();
        $categorias = Categoria::where('activo', true)->orderBy('nombre')->get();
        return view('productos.index', compact('productos', 'categorias'));
    }

    public function create() {
        $categorias = Categoria::where('activo', true)->get();
        return view('productos.create', compact('categorias'));
    }

    public function store(ProductoRequest $request) {
        Producto::create($request->validated());
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show(Producto $producto) {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto) {
        $categorias = Categoria::where('activo', true)->get();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(ProductoRequest $request, Producto $producto) {
        $producto->update($request->validated());
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto) {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}