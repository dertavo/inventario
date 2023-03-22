<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorias;

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
        return $this->hasMany(Categorias::class);
    }
}
