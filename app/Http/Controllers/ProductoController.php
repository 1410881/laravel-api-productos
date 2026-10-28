<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest; // <-- Importamos

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        return response()->json([
            'success' => true,
            'message' => 'Lista de productos',
            'data' => $productos
        ], 200);
    }

    public function store(StoreProductoRequest $request) // <-- Usamos el Request
    {
        $producto = Producto::create($request->validated()); // <-- validated() solo trae lo que pasó la regla

        return response()->json([
            'success' => true,
            'message' => 'Producto creado correctamente',
            'data' => $producto
        ], 201);
    }

    public function show($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Detalle del producto',
            'data' => $producto
        ], 200);
    }

    public function update(StoreProductoRequest $request, $id) // <-- Reutilizamos el Request para actualizar
    {
        $producto = Producto::findOrFail($id);
        $producto->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Producto actualizado correctamente',
            'data' => $producto
        ], 200);
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return response()->json([
            'success' => true,
            'message' => 'Producto eliminado correctamente',
            'data' => []
        ], 200);
    }
}
