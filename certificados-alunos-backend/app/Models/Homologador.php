<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homologador extends Model
{
    use HasFactory;

    protected $table = 'homologador';

    public $timestamps = false;

    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function homologacoes()
    {
        return $this->hasMany(Homologacao::class);
    }
}
