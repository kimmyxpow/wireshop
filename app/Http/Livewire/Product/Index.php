<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate = 10;
    public $search;
    public $formVisible;
    public $formUpdate = false;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected $listeners = [
        'formClose' => 'formCloseHandler',
        'productStored' => 'productStoredHandler',
        'productUpdated' => 'productUpdatedHandler'
    ];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        return view('livewire.product.index', [
            'products' => Product::where('title', 'like', "%{$this->search}%")->latest()->paginate($this->paginate),
        ]);
    }

    public function formCloseHandler()
    {
        $this->formVisible = false;
    }

    public function productStoredHandler()
    {
        $this->formCloseHandler();
        session()->flash('message', 'Your product was stored');
    }

    public function editProduct($productId)
    {
        $this->formUpdate = true;
        $this->formVisible = true;
        $product = Product::find($productId);
        $this->emit('editProduct', $product);
    }

    public function productUpdatedHandler() {
        $this->formCloseHandler();
        session()->flash('message', 'Your product was updated');
    }

    public function deleteProduct($productId) {
        $product = Product::find($productId);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        session()->flash('message', 'Product was deleted');
    }
}
