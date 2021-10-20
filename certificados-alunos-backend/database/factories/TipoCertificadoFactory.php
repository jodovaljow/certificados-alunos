<?php

namespace Database\Factories;

use App\Models\TipoCertificado;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoCertificadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TipoCertificado::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipo' => $this->faker->word(),
        ];
    }
}
