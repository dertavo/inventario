<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionProducto extends Model
{
    use HasFactory;

    protected $table ="calificacion_producto";
    protected $fillable =[
        "id_producto",
        "calificacion",
    ];
}
