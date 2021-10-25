<?php

namespace Database\Seeders;

use App\Models\Certificado;
use App\Models\Homologacao;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Seeder;

class HomologacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CertificadoSeeder::class,
        ]);

        $this->certificadosJowAlunoSeeder();
        $this->certificadosNaoJowAlunoSeeder();
    }

    private function certificadosJowAlunoSeeder()
    {
        $certificadosJowAluno = Certificado::whereDoesntHave('homologacao')
            ->whereHas('aluno.user', function (Builder $query) {
                $query->where('email', 'jowaluno@unit.br');
            })
            ->limit(9)
            ->get();

        $certificadosJowAluno->each(function ($certificadoJowAluno, $key) {

            if ($key < 5) {

                $homologacao = Homologacao::factory(['status' => 'iniciado', 'horas' => 5,])->make();
            } else if ($key < 7) {

                $homologacao = Homologacao::factory(['status' => 'homologado', 'horas' => $certificadoJowAluno->horas,])->make();
            } else if ($key < 8) {

                $homologacao = Homologacao::factory(['status' => 'homologado', 'horas' => $certificadoJowAluno->horas - 1,])->make();
            } else {

                $homologacao = Homologacao::factory(['status' => 'negado', 'horas' => 1,])->make();
            }

            $homologacao->certificado()->associate($certificadoJowAluno);

            $homologacao->save();
        });
    }

    private function certificadosNaoJowAlunoSeeder()
    {
        $certificadosNaoJowAluno = Certificado::whereDoesntHave('homologacao')
            ->whereDoesntHave('aluno.user', function (Builder $query) {
                $query->where('email', 'jowaluno@unit.br');
            })
            ->limit(11)
            ->get();

        $certificadosNaoJowAluno->each(function ($certificadoSemHomologacao, $key) {

            $homologacao = Homologacao::factory()->make();

            $homologacao->certificado()->associate($certificadoSemHomologacao);

            $homologacao->save();
        });
    }
}
