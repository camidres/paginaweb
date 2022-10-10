<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image', 'icon'];



    public function subcategories(){

        //relacion uno a muchos
        return $this->hasMany(subcategory::class);

    }

      //Relacion muchos a muchos
      public function brands(){
        return $this->belongsToMany(Brand::class);
    }




    public function products(){

        //relacion muchos a muchos
        return $this->hasManyThrough(products::class, subcategory::class);

    }

    // URL AMIGABLES

    public function getRouteKeyName()
    {
        return 'slug';
    }


}
