<?php 

namespace App\Helpers;

use App\Models\Product;

class Cart 
{
    public function __construct()
    {
        if (is_null($this->get())) {
            $this->set($this->empty());
        }
    }

    public function set($cart)
    {
        return request()->session()->put('cart', $cart);
    }

    public function get()
    {
        return request()->session()->get('cart', $this->empty());
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
        array_splice(
            $cart['products'],
            array_search(
                $productId,
                array_column(
                    $cart['products'],
                    'id'
                )
            ),
            1
        );
        $this->set($cart);
    }

    public function clear()
    {
        $this->set($this->empty());
    }
}