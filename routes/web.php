<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('Producto', [ProductoController::class, 'index'])
        ->name('Producto.index');

Route::get('Producto/create', [ProductoController::class, 'create'])
        ->name('Producto.create');

        Route::post('Producto/create', [ProductoController::class, 'store'])
        ->name('Producto.store');

Route::get('Producto/update/{id}', [ProductoController::class, 'update'])
        ->name('Producto.update');
        Route::post('Producto/Update', [ProductoController::class, 'storeUpdate'])
        ->name('Producto.storeUpdate');

Route::delete('Producto/{id}',[ProductoController::class,'deleteproducto'])
        ->name('Producto.deleteproducto');
        