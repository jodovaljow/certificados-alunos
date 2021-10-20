<?php

namespace Tests\Feature;

use App\Models\Certificado;
use Database\Seeders\HomologacaoSeeder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomologacaoTest extends TestCase
{
    use RefreshDatabase;

    public function testSeeder()
    {
        $this->seed(HomologacaoSeeder::class);

        $this->assertDatabaseCount('homologacoes', 20);

        $certificadosJowAlunoSemIniciar = Certificado::whereDoesntHave('homologacao')
            ->whereHas('aluno.user', function (Builder $query) {
                $query->where('email', 'jowaluno@unit.br');
            })
            ->get();

        $this->assertCount(7, $certificadosJowAlunoSemIniciar);

        $certificadosJowAlunoIniciado = Certificado::isIniciado()
            ->whereHas('aluno.user', function (Builder $query) {
                $query->where('email', 'jowaluno@unit.br');
            })
            ->get();

        $this->assertCount(5, $certificadosJowAlunoIniciado);

        $certificadosJowAlunoHomologado = Certificado::isHomologado()
            ->whereHas('aluno.user', function (Builder $query) {
                $query->where('email', 'jowaluno@unit.br');
            })
            ->get();

        $this->assertCount(3, $certificadosJowAlunoHomologado);

        $certificadosJowAlunoNegado = Certificado::isNegado()
            ->whereHas('aluno.user', function (Builder $query) {
                $query->where('email', 'jowaluno@unit.br');
            })
            ->get();

        $this->assertCount(1, $certificadosJowAlunoNegado);
    }
}
