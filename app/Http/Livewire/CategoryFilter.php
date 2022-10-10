<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use phpDocumentor\Reflection\Types\This;
use Livewire\WithPagination;
use App\Models\products;
use Illuminate\Contracts\Database\Eloquent\Builder;

class CategoryFilter extends Component
{
    use WithPagination;

    public $category, $subcategoria, $marca;
    public $view = "grid";

    protected $queryString = ['subcategoria', 'marca'];

    public function limpiar(){
        $this->reset(['subcategoria', 'marca', 'page']);
    }


    public function updatedSubcategoria(){
        $this->resetPage();
    }

    public function updatedMarca(){
        $this->resetPage();
    }

    public function render()
    {


        // $products = $this->category->products()
        //             ->where('status', 2)->paginate(10);

        $productsQuery = products::query()->whereHas('subcategory.category', function(Builder $query){
            $query->where('id', $this->category->id);
        });

        if($this->subcategoria){
            $productsQuery = $productsQuery->whereHas('subcategory', function(Builder $query){
                $query->where('slug', $this->subcategoria);
            });
        }

        if($this->marca){
            $productsQuery = $productsQuery->whereHas('brand', function(Builder $query){
                $query->where('name', $this->marca);
            });
        }

        $products = $productsQuery->paginate(10);

        return view('livewire.category-filter', compact('products'));
    }
}
