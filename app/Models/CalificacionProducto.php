<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Model\Productos;

class CalificacionProducto extends Model
{
    use HasFactory;

    protected $table ="calificacion_producto";
    protected $fillable =[
        "id_producto",
        "calificacion",
    ];

    public function producto(): BelongsTo
    {
        return $this->belongsToMany(Productos::class);
    }
}
