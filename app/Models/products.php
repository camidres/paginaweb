<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Unique;

class products extends Model
{
    use HasFactory;

    const BORRADOR = 1;

    const PUBLICADO = 2;

    protected $guarded = ['id', 'created_add', 'updated_add'];




    public function subcategory(){

        return $this->belongsTo(subcategory::class);


    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    //Relacion uno a muchos inversa
    public function brand(){
        return $this->belongsTo(Brand::class);
    }



   //relacion uno a muchos polimorfica

   public function  images(){

    return $this->morphMany(image::class, "imageable");
   }

   // URL AMIGABLES

   public function getRouteKeyName()
   {
       return 'slug';
   }
}
