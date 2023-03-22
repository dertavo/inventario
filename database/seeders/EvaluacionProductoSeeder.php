<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Productos;

class EvaluacionProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $productos  = Productos::all();

        foreach ($productos as $key => $producto) {
            \App\Models\EvaluacionProducto::create([
                'id_producto'   => $producto->id,
                'calificacion' =>fake()->numberBetween(1, 5),
            ]);
        }
       
    }
}
