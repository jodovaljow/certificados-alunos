<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'horas',
        'path',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function tipo_certificado()
    {
        return $this->belongsTo(TipoCertificado::class, 'tipo_certificado_id');
    }

    public function homologacao()
    {
        return $this->hasOne(Homologacao::class);
    }

    public function scopeIsIniciado($query)
    {
        return $query->whereHas('homologacao', function (Builder $query) {
            $query->isIniciado();
        });
    }

    public function scopeIsHomologado($query)
    {
        return $query->whereHas('homologacao', function (Builder $query) {
            $query->isHomologado();
        });
    }

    public function scopeIsNegado($query)
    {
        return $query->whereHas('homologacao', function (Builder $query) {
            $query->isNegado();
        });
    }
}
