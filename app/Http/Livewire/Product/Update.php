<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class Update extends Component
{
    public $name;
    public $image;
    public $description;
    public $qty;
    public $price;

    protected $listeners = ['showProduct'];

    public function showProduct($product)
    {
        $this->name = $product['name'];
        $this->image = $product['image'];
        $this->description = $product['description'];
        $this->qty = $product['qty'];
        $this->price = $product['price'];
    }



    public function render()
    {
        return view('livewire.product.update');
    }
}
