<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Eager loading category to avoid N+1 problem
        $products = Product::with('category:id,name')->get(['id', 'name', 'price', 'stock', 'category_id']);

        return view('products.index', compact('products'));
    }
}

