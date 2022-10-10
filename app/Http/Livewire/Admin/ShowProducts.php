<?php

namespace App\Http\Livewire\Admin;

use App\Models\products;
use Livewire\Component;

use Livewire\WithPagination;

class ShowProducts extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {


        $products = products::where('name', 'LIKE', '%' . $this->search . '%')->paginate(10);

        return view('livewire.admin.show-products', compact('products'))->layout('layouts.admin');
    }
}
