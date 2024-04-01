<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductApiControllerV3 extends Controller
{
    public function index(): JsonResponse
    {

        $products = new ProductCollection(Product::all());

        return response()->json($products, 200);

    }

    public function paginate(): JsonResponse
    {

        $products = new ProductCollection(Product::paginate(5));

        return response()->json($products, 200);

    }

    public function store(Request $request)
    {
        // Validar la solicitud
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        // Crear un nuevo producto
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->save();

        // Devolver respuesta
        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    }
    
}
