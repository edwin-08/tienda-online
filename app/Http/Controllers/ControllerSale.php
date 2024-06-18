<?php

namespace App\Http\Controllers;

use App\Models\ModelCustomer;
use App\Models\ModelProduct;
use App\Models\ModelSale;
use Illuminate\Http\Request;

class ControllerSale extends Controller
{
    public function index()
    {
        return view("tienda.facturacion");
    }

    public function searchCliente(Request $request)
    {
        $cedula = $request->id;
        $info = ModelCustomer::where("cedula", $cedula)->first();
        return response()->json(['status' => true, 'info' => $info->toArray()], 200);
    }

    public function searchItem(Request $request)
    {
        $id = $request->id;
        $info = ModelProduct::where("id", $id)->where("stock", "<>", 0)->get();
        if (count($info) > 0) {
            return response()->json(['status' => true, 'info' => $info->toArray()], 200);
        } else {
            return response()->json(['status' => false], 401);
        }
    }

    public function saveInformacion(Request $request)
    {
        $cedula = $request->cedula;
        $nombre = $request->nombre;
        $email = $request->email;
        $valor = $request->valor;

        $info = ModelCustomer::where("cedula", $cedula)->first();
        if (!$info) {
            $info = ModelCustomer::create([
                'cedula' => $cedula,
                'nombre' => $nombre,
                'email' => $email
            ]);
        }

        for ($i = 1; $i < $valor; $i++) {
            $codigo = $request['codigo' . $i];
            $nombre = $request['nombre' . $i];
            $precio = $request['precio' . $i];
            $cantidad = $request['cantidad' . $i];

            ModelSale::create([
                'id_customer' => $info->id,
                'id_product' => $codigo,
                'cantidad' => $cantidad,
                'precio' => $precio,
                'estado' => "Facturado"
            ]);

           $info_ =  ModelProduct::find($codigo);
           $info_->stock = ($info_->stock-$cantidad);
           $info_->save();
        }

        return response()->json(['status' => true], 200);
    }
}
