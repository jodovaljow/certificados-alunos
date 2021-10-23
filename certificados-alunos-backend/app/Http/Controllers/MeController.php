<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MeController extends Controller
{
    public function __invoke()
    {
        return User::findOrFail(Auth::id())->append(['is_aluno', 'is_homologador']);
    }
}
