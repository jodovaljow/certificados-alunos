<?php

namespace Database\Seeders;

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
        User::factory()->count(50)->hasHomologador()->create();

        User::factory()->hasHomologador()->create([
            'email' => 'jowhomologador@unit.br',
        ]);
    }
}
