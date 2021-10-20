<?php

namespace Database\Factories;

use App\Models\Certificado;
use App\Models\Homologacao;
use App\Models\Homologador;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomologacaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Homologacao::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'horas' => $this->faker->numberBetween(1, 360),
            'status' => $this->faker->randomElement(['iniciado', 'homologado', 'negado']),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Homologacao $homologacao) {

            if (!$homologacao->homologador) {

                $homologador = Homologador::factory()->create();

                $homologacao->homologador()->associate($homologador);
            }

            if (!$homologacao->certificado) {

                $certificado = Certificado::inRandomOrder()->first();

                $homologacao->certificado()->associate($certificado);
            }
        })->afterCreating(function (Homologacao $homologacao) {
        });
    }
}
