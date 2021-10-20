<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomologacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homologacoes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedSmallInteger('horas');
            $table->enum('status', ['iniciado', 'homologado', 'negado'])->default('iniciado');
            $table->foreignId('homologador_id')
                ->constrained('homologador')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('certificado_id')
                ->constrained('certificados')
                ->unique()
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
        Schema::dropIfExists('homologacoes');
    }
}
