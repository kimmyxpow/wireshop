<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

    public $title, $description, $price, $image;

    public function render()
    {
        return view('livewire.product.create');
    }

    public function store()
    {
        $this->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'max:180'],
            'price' => ['required', 'numeric'],
            'image' => ['file', 'image', 'max:2048']
        ]);

        $imageName = '';

        if ($this->image) {
            $imageName = Str::slug($this->title, '-') . '-' . uniqid() . '.' . $this->image->getClientOriginalExtension();

            $this->image->storeAs('public', $imageName, 'local');
        }

        Product::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $imageName
        ]);

        $this->emit('productStored');
    }
}
