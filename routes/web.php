<?php

use App\Http\Controllers\ControllerPuntoCinco;
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

Route::post("ordenar-numeros",[ControllerPuntoCinco::class, 'index'])->name("ordenar.numero");
