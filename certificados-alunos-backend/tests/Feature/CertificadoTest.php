<?php

namespace Tests\Feature;

use App\Models\Aluno;
use Database\Seeders\CertificadoSeeder;
use Database\Seeders\HomologacaoSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CertificadoTest extends TestCase
{
    use RefreshDatabase;

    public function testSeeder()
    {
        $this->seed(CertificadoSeeder::class);

        $this->assertDatabaseCount('certificados', 66);

        $certificadosJowAluno = Aluno::with('certificados')->whereRelation('user', 'email', 'jowaluno@unit.br')->first();
        $this->assertCount(16, $certificadosJowAluno->certificados);
    }

    public function test_post_certificado()
    {
        $this->seed(HomologacaoSeeder::class);

        Storage::fake('certificados');

        $file = UploadedFile::fake()->image('teste.jpg');

        $aluno = Aluno::whereRelation('user', 'email', 'jowaluno@unit.br')->first();
        $response = $this->actingAs($aluno->user)->post('/api/certificado', [
            'certificado' => $file,
            'nome' => 'Certificado de Teste',
            'horas' => 2,
            'tipo_certificado' => 'ensino',
        ]);

        $response->assertStatus(200);

        Storage::assertExists($file->hashName());
    }
}
