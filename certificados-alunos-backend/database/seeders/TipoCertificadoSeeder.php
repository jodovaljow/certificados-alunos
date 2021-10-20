<?php

namespace Database\Seeders;

use App\Models\TipoCertificado;
use Illuminate\Database\Seeder;

class TipoCertificadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoCertificado::factory()->createMany([
            [
                'tipo' => 'pesquisa',
            ],
            [
                'tipo' => 'ensino',
            ],
            [
                'tipo' => 'extensão',
            ],
        ]);
    }
}
