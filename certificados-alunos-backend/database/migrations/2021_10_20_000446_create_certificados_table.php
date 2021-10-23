<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificados', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedSmallInteger('horas');
            $table->string('path');
            $table->foreignId('aluno_id')
                ->constrained('alunos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('tipo_certificado_id')
                ->constrained('tipos_certificados')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificados');
    }
}
