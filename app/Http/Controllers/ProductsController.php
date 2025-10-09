<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function products_index()
    {
        $filter = '';
        $products = Product::get();
        return view('products.products_index', compact('products', 'filter'));
    }
    public function product_add()
    {
        return view('products.add_product');
    }
    public function product_store(Request $request)
    {
        $request->validate([
            'product_img' => 'required|image|mimes:png,jpg,jpeg,webp',
            'product_name' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
            'product_price' => 'required|decimal:2'
        ]);

        $file = $request->file('product_img');
        $extension = $file->getClientOriginalExtension();
        $file_name = time() . '.' . $extension;

        $path = 'uploads/products/product_images/';
        $file->move($path, $file_name);

        Product::create([
            'product_img' => $path . $file_name,
            'product_name' => $request->product_name,
            'product_category' => $request->product_category,
            'product_price' => $request->product_price
        ]);

        return redirect()->back()->with('status', 'Product added successfully!');
    }

    public function product_filter(Request $request)
    {
        $filter = $request->input('filter');
        if (empty($filter)) {
            $products = Product::get();
        } else {
            $products = Product::where('product_category', $filter)->get();
        }
        return view('products.products_index', compact('products', 'filter'));
    }
}
