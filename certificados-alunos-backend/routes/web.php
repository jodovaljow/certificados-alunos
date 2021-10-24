<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\MeController;
use App\Http\Controllers\TipoCertificadoController;
use App\Models\Certificado;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('api')->group(function () {

    Route::get('query/aluno', [AlunoController::class, 'query'])->middleware('can:is-homologador');

    Route::post('login', [LoginController::class, 'login']);

    Route::delete('login', [LoginController::class, 'logout']);

    Route::any('me', MeController::class)->middleware(['api', 'web'])->name('me');

    Route::get('aluno/{aluno}', [AlunoController::class, 'show'])->middleware('can:view,aluno');

    Route::get('tipos', [TipoCertificadoController::class, 'index']);

    Route::prefix('certificado')->group(function () {

        Route::post('', [CertificadoController::class, 'store'])->middleware(['api', 'web', 'can:create,' . Certificado::class]);
        Route::get('{certificado}', [CertificadoController::class, 'show'])->middleware('can:view,certificado');
        Route::get('{certificado}/detail', [CertificadoController::class, 'showDetail'])->middleware('can:view,certificado');
    });
});
