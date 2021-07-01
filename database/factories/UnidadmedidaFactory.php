<?php

namespace Database\Factories;

use App\Models\Unidadmedida;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnidadmedidaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Unidadmedida::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'   => $this->faker->randomElement(['KG', 'UNIDAD']),
        ];
    }
}
