<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);
        Product::create($data);
        return redirect()->route('products.index');
    }
}
