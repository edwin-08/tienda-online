<?php

namespace App\Http\Controllers;

use App\Models\ModelProduct;
use Illuminate\Http\Request;

class ControllerProduct extends Controller
{
    public function index()
    {
        $info = ModelProduct::all();
        return view("tienda.productos.infoProductos", ['info' => $info]);
    }
}
