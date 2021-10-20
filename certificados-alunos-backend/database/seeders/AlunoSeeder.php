<?php

namespace Database\Seeders;

use App\Models\Aluno;
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
        Aluno::factory(50)->create();

        User::factory()->hasAluno()->create([
            'email' => 'jowaluno@unit.br',
        ]);
    }
}
