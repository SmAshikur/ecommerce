<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Get all categories
    public function index()
    {
        return response()->json(Category::all(), 200);
    }

    // Create a new category
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:categories',
        ]);

        $category = Category::create($validated);
        return response()->json($category, 201);
    }
}

