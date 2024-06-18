<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSale extends Model
{
    use HasFactory;

    protected $table = "sale";

    protected $fillable = [
        'id',
        'id_customer',
        'id_product',
        'cantidad',
        'precio',
        'estado'
    ];
}
