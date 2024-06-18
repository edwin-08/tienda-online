<?php

namespace App\Http\Controllers;

use App\Models\ModelCustomer;
use Illuminate\Http\Request;

class ControllerCustomer extends Controller
{
    public function index()
    {
        $info = ModelCustomer::all();
        return view("tienda.clientes.infoTable", ['info' => $info]);
    }
}
