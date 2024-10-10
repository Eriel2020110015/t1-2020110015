<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|size:12|unique:products',
            'product_name' => 'required|string|max:255',
            'retail_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',
            'origin' => 'required|size:2',
            'quantity' => 'required|integer|min:0',
            'product_image' => 'image|nullable|max:2048', // Allow image files only
        ]);

        $productImagePath = null;

        if ($request->hasFile('product_image')) {
            $productImagePath = $request->file('product_image')->store('images', 'public'); // Store in 'storage/app/public/images'
        }

        Product::create(array_merge($request->all(), ['product_image' => $productImagePath]));

        return redirect()->route('products.index');
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'retail_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',
            'origin' => 'required|size:2',
            'quantity' => 'required|integer|min:0',
            'product_image' => 'image|nullable|max:2048', // Allow image files only
        ]);

        $product = Product::findOrFail($id);
        $productImagePath = $product->product_image; // Keep the old image path

        if ($request->hasFile('product_image')) {
            // If a new image is uploaded, store it and update the path
            $productImagePath = $request->file('product_image')->store('images', 'public');
        }

        $product->update(array_merge($request->all(), ['product_image' => $productImagePath]));

        return redirect()->route('products.index');
    }


    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('products.index');
    }

    public function dashboard()
    {
        $totalQuantity = Product::sum('quantity'); // Total quantity of products
        $mostExpensiveProduct = Product::orderBy('retail_price', 'desc')->first(); // Most expensive product
        $highestQuantityProduct = Product::orderBy('quantity', 'desc')->first(); // Product with the highest quantity

        return view('dashboard', compact('totalQuantity', 'mostExpensiveProduct', 'highestQuantityProduct'));
    }

}
