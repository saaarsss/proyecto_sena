<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class Product extends Model
// {
//     use HasFactory;

//     function brand(){
//         return $this -> belongsTo(Brand::class);
//     }
//     function category(){
//         return $this -> belongsTo(Category::class);
//     }
//     function products(){
//         return $this -> belongsToMany(product::class,'invoice_details');

//     }
// }

class Product extends Model
{
    use HasFactory;
    //protected $table = "productos";

    function brand(){
        return $this->belongsTo(Brand::class);
    }
    function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    function invoices(){
        return $this->belongsTo(Invoice::class,'invoice_details');
    }
}