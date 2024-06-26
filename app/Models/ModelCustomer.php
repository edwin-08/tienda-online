<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCustomer extends Model
{
    use HasFactory;

    protected $table = "customer";

    protected $fillable = [
        'id',
        'cedula',
        'nombre',
        'email'
    ];
}
