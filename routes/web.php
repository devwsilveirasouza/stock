<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeController::class);
Route::resource('/user', UserController::class);
// PRODUTOS ADM
Route::get('/product',                  [ProductController::class,'index'])->name('product.index');
Route::get('/product.create',           [ProductController::class,'create'])->name('product.create');
Route::post('/product.store',           [ProductController::class,'store'])->name('product.store');
Route::get('/product/{product}/show',   [ProductController::class,'show'])->name('product.show');
Route::get('/product/{product}/edit',   [ProductController::class,'edit'])->name('product.edit');
Route::put('/product/{product}',        [ProductController::class,'update'])->name('product.update');
Route::delete('/product/{product}',     [ProductController::class,'destroy'])->name('product.delete');

// MOVIMENTAÇÃO DE ESTOQUE
Route::get('/produto-transacao',     [ProductController::class,'transacao'])->name('produto.transacao');
Route::post('/produto-movimentacao', [ProductController::class,'gravarTransacao'])->name('produto.movimentacao');
Route::get('/enderecamento/{product}', [ProductController::class, 'enderecar'])->name('produto.enderecamento');
