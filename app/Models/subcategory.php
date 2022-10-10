<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_add', 'updated_add'];

    //relacion uno a muchos

    public function products(){

        return $this->hasMany(products::class);


    }




    //relacion uno muchos inversa

    public function category(){


        return $this->belongsTo(category::class);


    }







}
