<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('product')->paginate(10);
        return view('order.index', compact('orders'));
    }
    public function show(Order $order){
        return view('order.show', compact('order'));
    }
    public function store(OrderRequest $request){
        $data = $request->validated();
        Order::create($data);
        return redirect()->route('orders.index');
    }
    public function create(){
        $products = Product::all();
        return view('order.create', compact('products'));
    }
    public function update(Order $order, OrderService  $orderService){
        $orderService->update($order);
        return redirect()->route('orders.index');
    }
}
