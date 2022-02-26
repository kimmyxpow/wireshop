<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Update extends Component
{
    use WithFileUploads;

    public $productId, $title, $description, $price, $image, $imageOld;

    protected $listeners = [
        'editProduct' => 'editProductHandler'
    ];
    
    public function render()
    {
        return view('livewire.product.update');
    }

    public function editProductHandler($product) {
        $this->productId = $product['id'];
        $this->title = $product['title'];
        $this->description = $product['description'];
        $this->price = $product['price'];
        $this->imageOld = asset('/storage/' . $product['image']);
    }

    public function update() {
        $this->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'max:180'],
            'price' => ['required', 'numeric'],
            'image' => ['file', 'image', 'max:2048']
        ]);

        if ($this->productId) {
            $product = Product::find($this->productId);
            $image = '';

            if ($this->image) {
                Storage::disk('public')->delete($product->image);
                $imageName = Str::slug($this->title, '-') . '-' . uniqid() . '.' . $this->image->getClientOriginalExtension();
                $this->image->storeAs('public', $imageName, 'local');
                $image = $imageName;
            } else {
                $image = $product->image;
            }

            $product->update([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'image' => $image
            ]);

            $this->emit('productUpdated');
        }
    }
}
