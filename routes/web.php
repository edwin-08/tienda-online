<?php

use App\Http\Controllers\ControllerCustomer;
use App\Http\Controllers\ControllerFacturacion;
use App\Http\Controllers\ControllerProduct;
use App\Http\Controllers\ControllerPuntoCinco;
use App\Http\Controllers\ControllerSale;
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

Route::get('/', function () {
    return view('logica');
})->name('home');

Route::post("ordenar-numeros", [ControllerPuntoCinco::class, 'index'])->name("ordenar.numero");

Route::group(['prefix' => 'facturacion'], function () {
    Route::get('', [ControllerSale::class, 'index'])->name('facturacion');
    Route::post('search-user', [ControllerSale::class, 'searchCliente'])->name('search.cliente');
    Route::post('search-item', [ControllerSale::class, 'searchItem'])->name('search.item');
    Route::post('save-info', [ControllerSale::class, 'saveInformacion'])->name('save.info.venta');
});

Route::group(['prefix' => 'cutomers'], function () {
    Route::get('', [ControllerCustomer::class, 'index'])->name('customers');
});

Route::group(['prefix' => 'prodcut'], function () {
    Route::get('', [ControllerProduct::class, 'index'])->name('products');
});

Route::group(['prefix' => 'estadisitcas'], function () {
    Route::get('', [ControllerFacturacion::class, 'index'])->name('estadisticas');
});
