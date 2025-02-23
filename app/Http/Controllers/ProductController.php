<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Providers\CustomServiceProvider;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(30);
        return view('products.index', compact('products'));
    }
    public function create(){
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }
    public function store(ProductRequest $request){
        $data = $request->validated();
        Product::create($data);
        return redirect()->route('products.index');
    }
    public function show(Product $product){
        return view('products.show', compact('product'));
    }
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }
    public function update(ProductRequest $request, Product $product, ProductService $productService){
        $data = $request->validated();
        return $productService->update($data, $product);
    }
    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('products.index');
    }
}
