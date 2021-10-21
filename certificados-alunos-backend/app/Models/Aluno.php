<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function certificados()
    {
        return $this->hasMany(Certificado::class);
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->with(['certificados.homologacao', 'certificados.tipo_certificado', 'user'])->findOrFail($value);
    }
}
