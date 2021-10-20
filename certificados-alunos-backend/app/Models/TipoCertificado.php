<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCertificado extends Model
{
    use HasFactory;

    protected $table = 'tipos_certificados';

    public $timestamps = false;
}
