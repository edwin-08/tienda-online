<?php

namespace App\Http\Controllers;

use App\Models\ModelSale;
use Illuminate\Http\Request;

class ControllerFacturacion extends Controller
{
    public function index()
    {
        $info = ModelSale::join("product as p", "p.id", "=", "id_product")
            ->join("customer as c", "c.id", "=", "id_customer")->get();
        return view("tienda.estadisticas.info", ['info' => $info]);
    }
}
