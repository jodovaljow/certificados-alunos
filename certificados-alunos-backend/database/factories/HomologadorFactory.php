<?php

namespace Database\Factories;

use App\Models\Homologador;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomologadorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Homologador::class;

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
        return $this->afterMaking(function (Homologador $homologador) {

            if (!$homologador->user) {

                $user = User::factory()->create();

                $homologador->user()->associate($user);
            }
        })->afterCreating(function (Homologador $homologador) {
        });
    }
}
