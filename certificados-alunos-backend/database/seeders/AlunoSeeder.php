<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(50)->hasAluno()->create();

        User::factory()->hasAluno()->create([
            'email' => 'jowaluno@unit.br',
        ]);
    }
}
