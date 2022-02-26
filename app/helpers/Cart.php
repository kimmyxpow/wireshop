<?php 

namespace App\Helpers;

use App\Models\Product;

class Cart 
{
    public function __construnt()
    {
        if ($this->get() === null) {
            $this->set($this->empty());
        }
    }

    public function set($cart)
    {
        request()->session()->put('cart', $cart);
    }

    public function get()
    {
        request()->session()->get('cart');
    }

    public function empty()
    {
        return [
            'products' => []
        ];
    }

    public function add(Product $product)
    {
        $cart = $this->get();
        array_push($cart['products'], $product);
        $this->set($cart);
    }

    public function remove($productId)
    {
        $cart = $this->get();
        array_splice($cart['products'], array_search($productId, array_column($cart['products'], 'id')));
        $this->set($cart);
    }

    public function clear()
    {
        $this->set($this->empty());
    }
}