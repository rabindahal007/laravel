<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registrationController;
use App\Http\Controllers\productController;
use App\Http\Controllers\listController;
use App\Http\Controllers\loginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::get('/register',[ registrationController::class, "index"] 
 //   );
//Route::post('/register', [ registrationController::class, "register"] );





                                                  //Crud

/*
Route::get('/product', [productController::class, 'index'])->name('product.index');
Route::get('/product/create', [productController::class, 'create'])->name('product.create');
Route::post('/product', [productController::class, 'store'])->name('product.store');         
Route::get('/product/{product}/edit', [productController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [productController::class, 'update'])->name('product.update');     
Route::delete('/product/{product}/destroy', [productController::class, 'destroy'])->name('product.destroy');       

*/


                           //TODO-LIST PROGRAM
                           /*
Route::get('/to-dolist', [listController::class, 'index'])->name('to-dolist.index');

Route::get('/to-dolist/create', [listController::class, 'create'])->name('to-dolist.create');
Route::post('/to-dolist', [listController::class, 'store'])->name('to-dolist.store');
Route::delete('/to-dolist/{list}/destroy', [listController::class, 'destroy'])->name('to-dolist.destroy');
*/


Route::get('/login',[loginController::class, 'login'])->name('log-in.doit');
Route::post('/login',[loginController::class, 'store'])->name('log-in.store');









/*Route::get('/demo/{name}/{id?}',function($name,$id=null)
{
    $data=compact('name','id');
    return view('demo')->with($data);
});
Route::get('/demo',function(){
    return view('demo');
});
*/
