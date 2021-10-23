<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function aluno()
    {
        return $this->hasOne(Aluno::class, 'id');
    }

    public function scopeIsAluno($query)
    {
        return $query->whereHas('aluno');
    }

    public function homologador()
    {
        return $this->hasOne(Homologador::class, 'id');
    }

    public function scopeIsHomologador($query)
    {
        return $query->whereHas('homologador');
    }

    public function getIsAlunoAttribute($value)
    {
        return $this->aluno()->exists();
    }

    public function getIsHomologadorAttribute($value)
    {
        return $this->homologador()->exists();
    }
}
