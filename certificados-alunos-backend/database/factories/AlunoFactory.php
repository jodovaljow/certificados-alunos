<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlunoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Aluno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Aluno $aluno) {

            if (!$aluno->user) {

                $user = User::factory()->create();

                $aluno->user()->associate($user);
            }
        })->afterCreating(function (Aluno $aluno) {
        });
    }
}
