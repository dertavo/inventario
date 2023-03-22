<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorias;
use App\Models\CalificacionProducto;
class Productos extends Model
{
    use HasFactory;

    protected $fillable =[

        "sku",
        "nombre",
        "id_categoria",
        "descripcion",
        "precio",
        "cantidad",
        "estado",
        

    ];

    public function categorias()
    {
        return $this->hasMany(Categorias::class,'id','id_categoria');
    }

    public function calificaciones()
    {
        return $this->hasMany(CalificacionProducto::class,'id_producto');
    }
}
