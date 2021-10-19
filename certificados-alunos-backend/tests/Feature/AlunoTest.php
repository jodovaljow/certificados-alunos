<?php

namespace Tests\Feature;

use App\Models\Aluno;
use App\Models\User;
use Database\Seeders\AlunoSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AlunoTest extends TestCase
{
    use RefreshDatabase;

    public function testSeeder()
    {
        $this->seed(AlunoSeeder::class);

        $this->assertDatabaseCount('alunos', 51);

        $usuariosAlunos = User::isAluno()->get();
        $this->assertCount(51, $usuariosAlunos);

        $aluno = Aluno::whereRelation('user', 'email', 'jowaluno@unit.br')->get();
        $this->assertNotEmpty($aluno);

        $alunoNaoCadastrado = Aluno::whereRelation('user', 'email', 'emailinvalido')->get();
        $this->assertEmpty($alunoNaoCadastrado);
    }
}
