<?php

namespace App\Services;

class ProductService
{
    public function update($data, $product){
        $product->update($data);
        return redirect()->route('products.show', $product->id);
    }
}
