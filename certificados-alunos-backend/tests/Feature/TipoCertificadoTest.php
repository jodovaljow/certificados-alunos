<?php

namespace Tests\Feature;

use Database\Seeders\TipoCertificadoSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TipoCertificadoTest extends TestCase
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
