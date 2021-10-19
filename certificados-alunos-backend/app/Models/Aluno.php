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
}
