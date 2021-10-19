<?php

namespace Tests\Feature;

use App\Models\Homologador;
use App\Models\User;
use Database\Seeders\HomologadorSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomologadorTest extends TestCase
{
    use RefreshDatabase;

    public function testSeeder()
    {
        $this->seed(HomologadorSeeder::class);

        $this->assertDatabaseCount('homologador', 51);

        $usuariosHomologadores = User::isHomologador()->get();
        $this->assertCount(51, $usuariosHomologadores);

        $homologador = Homologador::whereRelation('user', 'email', 'jowhomologador@unit.br')->get();
        $this->assertNotEmpty($homologador);

        $homologadorNaoCadastrado = Homologador::whereRelation('user', 'email', 'emailinvalido')->get();
        $this->assertEmpty($homologadorNaoCadastrado);
    }
}
