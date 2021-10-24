<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Certificado;
use App\Models\TipoCertificado;
use Illuminate\Support\Facades\Storage;

class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'certificado' => 'required|file',
            'nome' => 'required|string',
            'horas' => 'required|numeric|gte:1',
            'tipo_certificado' => 'required|exists:tipos_certificados,tipo',
        ]);

        $path = $request->file('certificado')->store('');

        $certificado = Certificado::make(
            [
                'nome' => $validated['nome'],
                'horas' => $validated['horas'],
                'path' => $path,
            ],
        );

        $aluno = Auth::user()->aluno;
        $certificado->aluno()->associate($aluno);

        $tipo_certificado = TipoCertificado::where('tipo', $validated['tipo_certificado'])->first();
        $certificado->tipo_certificado()->associate($tipo_certificado);

        $certificado->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function show(Certificado $certificado)
    {
        $arrayNameFile = explode('.', $certificado->path);
        $extension = end($arrayNameFile);

        return Storage::download(
            $certificado->path,
            $certificado->nome . '.' . $extension,
            [
                'Content-Disposition' => 'inline; filename="myfile.txt"'
            ]
        );
    }

    public function showDetail(Certificado $certificado)
    {
        return $certificado;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificado $certificado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificado $certificado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificado $certificado)
    {
        //
    }
}
