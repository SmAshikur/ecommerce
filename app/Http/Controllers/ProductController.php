<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Get all products
    public function index()
    {
        return response()->json(Product::with('category')->get(), 200);
    }

    // Get products by category
    public function productsByCategory($categoryName)
    {
        $category = Category::where('name', $categoryName)->first();
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $products = Product::where('category_id', $category->id)->get();
        return response()->json($products, 200);
    }

    // Get product details
    public function show($id)
    {
        $product = Product::with('category')->find($id);
        return $product ? response()->json($product, 200) :
            response()->json(['error' => 'Product not found'], 404);
    }

    // Create a new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|string'
        ]);

        $product = Product::create($validated);
        return response()->json($product, 201);
    }
}
