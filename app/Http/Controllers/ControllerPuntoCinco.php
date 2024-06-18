<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerPuntoCinco extends Controller
{
    public function index(Request $request){
        $num1 = $request->num1;
        $num2 = $request->num2;
        $num3 = $request->num3;

        $numeros = [$num1, $num2, $num3];
        rsort($numeros);
        return response()->json(['status' => true, 'numeros' => $numeros], 200);
    }
}
