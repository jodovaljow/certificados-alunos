<?php

namespace Tests\Feature;

use App\Models\Aluno;
use App\Models\User;
use Database\Seeders\AlunoSeeder;
use Database\Seeders\TipoCertificadoSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CertificadoTest extends TestCase
{
    use RefreshDatabase;

    public function testSeeder()
    {
        $this->seed(TipoCertificadoSeeder::class);

        $this->assertDatabaseCount('tipos_certificados', 3);

        $this->assertDatabaseHas('tipos_certificados', ['tipo' => 'pesquisa']);
        $this->assertDatabaseHas('tipos_certificados', ['tipo' => 'ensino']);
        $this->assertDatabaseHas('tipos_certificados', ['tipo' => 'extensão']);
        $this->assertDatabaseMissing('tipos_certificados', ['tipo' => 'away']);
    }
}
