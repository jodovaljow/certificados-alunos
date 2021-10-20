<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homologacao extends Model
{
    use HasFactory;

    protected $table = 'homologacoes';

    public function homologador()
    {
        return $this->belongsTo(Homologador::class);
    }

    public function certificado()
    {
        return $this->belongsTo(Certificado::class);
    }

    public function scopeIsIniciado($query)
    {
        return $query->where('status', 'iniciado');
    }

    public function scopeIsHomologado($query)
    {
        return $query->where('status', 'homologado');
    }

    public function scopeIsNegado($query)
    {
        return $query->where('status', 'negado');
    }
}
