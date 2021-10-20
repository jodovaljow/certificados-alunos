<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\Certificado;
use App\Models\TipoCertificado;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertificadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Certificado::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->sentence(),
            'horas' => $this->faker->numberBetween(1, 360),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Certificado $certificado) {

            if (!$certificado->aluno) {

                $aluno = Aluno::factory()->create();

                $certificado->aluno()->associate($aluno);
            }

            if (!$certificado->tipo_certificado) {

                $tipo_certificado = TipoCertificado::inRandomOrder()->first();

                $certificado->tipo_certificado()->associate($tipo_certificado);
            }
        })->afterCreating(function (Certificado $certificado) {
        });
    }
}
