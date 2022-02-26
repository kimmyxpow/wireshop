<?php

namespace App\Http\Livewire\Shop;

use App\Facades\Cart;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Product;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function render()
    {
        return view('livewire.shop.index', [
            'products' => $this->search === null 
                            ? Product::latest()->paginate(8)
                            : Product::latest()->where('title', 'like', '%' . $this->search . '%')->paginate(8)
        ]);
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);
        Cart::add($product);
        $this->emit('addToCart');
    }
}
