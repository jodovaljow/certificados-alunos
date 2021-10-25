<?php

namespace Tests\Feature;

use App\Models\Aluno;
use App\Models\User;
use Database\Seeders\AlunoSeeder;
use Database\Seeders\HomologacaoSeeder;
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

    public function test_route_aluno()
    {
        $this->seed(HomologacaoSeeder::class);

        $aluno = Aluno::whereRelation('user', 'email', 'jowaluno@unit.br')->first();

        $response = $this->actingAs($aluno->user)->get('/api/aluno/' . $aluno->id);

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $aluno->id,
            'certificados' => [],
            'user' => [
                'id' => $aluno->id,
                'name' => 'Jodoval Luiz dos Santos Junior Aluno',
                'email' => 'jowaluno@unit.br',
            ],
        ]);

        $response->assertJsonCount(16, 'certificados');
    }
}
