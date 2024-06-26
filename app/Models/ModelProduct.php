<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelProduct extends Model
{
    use HasFactory;

    protected $table = "product";

    protected $fillable = [
        'id',
        'producto',
        'stock',
        'price'
    ];
}
