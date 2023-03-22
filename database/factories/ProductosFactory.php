<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categorias;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productos>
 */
class ProductosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sku' => Str::random(15),
            'nombre' => fake()->word(),
            'id_categoria' => function () {
               
                return Categorias::factory()->create()->id;
            },
            'descripcion' => fake()->sentence(),
            'precio' => fake()->randomFloat(2, 1, 1000),
            'cantidad' => fake()->numberBetween(1, 100),
            'estado' => 'con inventario',
        ];
    }
}
