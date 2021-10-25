<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Certificado;
use App\Models\User;
use Illuminate\Database\Seeder;

class CertificadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TipoCertificadoSeeder::class,
            HomologadorSeeder::class,
        ]);

        Certificado::factory(50)->create();

        User::factory()->has(
            Aluno::factory()->has(
                Certificado::factory(16)
            )
        )->create([
            'name' => 'Jodoval Luiz dos Santos Junior Aluno',
            'email' => 'jowaluno@unit.br',
        ]);
    }
}
