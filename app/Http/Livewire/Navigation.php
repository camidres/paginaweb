<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\category;

class Navigation extends Component
{
    public function render()
    {
        $categories = category::all();

        return view('livewire.navigation', compact('categories'));
    }
}
