<?php

namespace Tests\Feature;

use App\Models\Aluno;
use Database\Seeders\CertificadoSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CertificadoTest extends TestCase
{
    use RefreshDatabase;

    public function testSeeder()
    {
        $this->seed(CertificadoSeeder::class);

        $this->assertDatabaseCount('certificados', 60);

        $certificadosJowAluno = Aluno::with('certificados')->whereRelation('user', 'email', 'jowaluno@unit.br')->first();
        $this->assertCount(10, $certificadosJowAluno->certificados);
    }
}
