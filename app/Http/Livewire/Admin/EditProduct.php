<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\image;
use Livewire\Component;

use App\Models\products;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

class EditProduct extends Component
{

    public $product, $categories, $subcategories, $brands, $slug;

    public $category_id;

    protected $rules = [
        'category_id' => 'required',
        'product.subcategory_id' => 'required',
        'product.name' => 'required',
        'slug' => 'required|unique:products,slug',
        'product.description' => 'required',
        'product.brand_id' => 'required',
        'product.price' => 'required',
        'product.quantity' => 'numeric',
    ];

    protected $listeners = ['refreshProduct', 'delete'];

    public function mount(products $product){
        $this->product = $product;

        $this->categories = Category::all();

        $this->category_id = $product->subcategory->category->id;

        $this->subcategories = subcategory::where('category_id', $this->category_id)->get();

        $this->slug = $this->product->slug;

        $this->brands = Brand::whereHas('categories', function(Builder $query){
            $query->where('category_id', $this->category_id);
        })->get();
    }

    public function refreshProduct(){
        $this->product = $this->product->fresh();
    }

    public function updatedCategoryId($value){
        $this->subcategories = subcategory::where('category_id', $value)->get();

        $this->brands = Brand::whereHas('categories', function(Builder $query) use ($value){
            $query->where('category_id', $value);
        })->get();

        /* $this->reset(['subcategory_id', 'brand_id']); */
        $this->product->subcategory_id = "";
        $this->product->brand_id = "";
    }

    public function updatedProductName($value){
        $this->slug = Str::slug($value);
    }


    public function getSubcategoryProperty(){
        return subcategory::find($this->product->subcategory_id);
    }

    public function save(){
        $rules = $this->rules;
        $rules['slug'] = 'required|unique:products,slug,' . $this->product->id;


                $rules['product.quantity'] = 'required|numeric';


        $this->validate($rules);

        $this->product->slug = $this->slug;

        $this->product->save();

        $this->emit('saved');
    }

    public function deleteImage(image $image){
        Storage::delete([$image->url]);
        $image->delete();

        $this->product = $this->product->fresh();
    }

    public function delete(){

        $images = $this->product->images;

        foreach ($images as $image) {
            Storage::delete($image->url);
            $image->delete();
        }

        $this->product->delete();

        return redirect()->route('admin.index');

    }

    public function render()
    {
        return view('livewire.admin.edit-product')->layout('layouts.admin');
    }
}
