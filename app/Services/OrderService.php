<?php

namespace App\Services;

class OrderService
{
    public function update($order){
        $order->update(['status' => 'выполнен']);
    }
}
