<?php

namespace Database\Seeders;

use App\Models\Homologador;
use App\Models\User;
use Illuminate\Database\Seeder;

class HomologadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Homologador::factory(50)->create();

        User::factory()->hasHomologador()->create([
            'email' => 'jowhomologador@unit.br',
        ]);
    }
}
