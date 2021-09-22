<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/nombre/{unaVariable?}', function  ($unaVariable = 'pepito') {

    return "Nombre : " .ucwords ($unaVariable);
})->where('unaVariable', '[A-Za-z]+');

use App\Http\Controllers\PersonaControlle;

Route::get('/nombre/{nombre?}', [PersonaControlle::class , 'mostrarNombre']
)->where('nombre', '[A-Za-z]+');



Route::get('/numero/{identificacion?}', function  ($identificacion = null) {
    
if (!$identificacion){
    return "Solo se acepta una identificacion";
}

    return "identificacion:" .number_format($identificacion);
    
})->where('numero', '[0-9-zA-ZñÑ]+');

//
/*use Illuminate\Support\Facades\DB;
Route::get('/products', function(){
    //$products = DB::table('products')->get();
    $products
    //return dd($products);
});*/
use App\Http\Controllers\ProductController;
Route::get('/products', [ProductController::class ,"show"]);

Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');

Route::get('/product/form/{id?}',[ProductController::class,'form'])->name('product.form');

Route::post('/product/save',[ProductController::class,'save'])->name('product.save');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\BrandController;

Route::get('/brands' , [BrandController::class , "show"]);

Route::get('/brand/delete/{id}',[BrandController::class, 'delete'])->name('brand.delete');
Route::get('/brand/formBrand/{id?}', [BrandController::class, 'form'])->name('brand.formBrand');
Route::post('/brand/saveBrand', [BrandController::class, 'save'])->name('brand.saveBrand');


use App\Http\Controllers\CategoryController;



Route::get('/categories' , [CategoryController::class , "show"]);
Route::get('/categorie/delete/{id}',[CategoryController::class, 'delete'])->name('categorie.delete');
Route::get('/categorie/formCategorie/{id?}', [CategoryController::class, 'form'])->name('categorie.formCategorie');
Route::post('/categorie/saveCategorie', [CategoryController::class, 'save'])->name('categorie.saveCategorie');


// Route::get('/invoice/{id}', function($id){
//     $invoice = App\Models\Invoice::findOrFail($id);
//     return dd($invoice->products);
// });

use App\Http\Controllers\InvoiceController;
Route::get('invoices', [InvoiceController::class , 'show']);
Route::get('invoice/form', [InvoiceController::class , 'form'])->name('invoice.form');