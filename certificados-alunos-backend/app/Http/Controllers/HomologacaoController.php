<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Certificado;
use App\Models\Homologacao;

class HomologacaoController extends Controller
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
        $validator = Validator::make($request->all(), [
            'id_certificado' => 'required|exists:certificados,id',
            'status' => 'required|in:iniciado,homologado,negado',
            'horas' => 'numeric|gte:1',
        ]);

        if ($validator->fails()) {

            return Response($validator->errors(), 403);
        }

        $certificado = Certificado::with('homologacao')->findOrFail($request->id_certificado);
        $homologador = Auth::user()->homologador;

        if ($certificado->homologacao) {

            $homologacao = $certificado->homologacao;
            $homologacao->horas = $request->input('horas', $certificado->horas);
            $homologacao->status = $request->input('status', $certificado->horas);
        } else {

            $homologacao = Homologacao::make([
                'horas' => $request->input('horas', $certificado->horas),
                'status' => $request->input('status', $certificado->status),
            ]);

            $homologacao->certificado()->associate($certificado);
        }

        $homologacao->homologador()->associate($homologador);

        $homologacao->save();

        return $homologacao;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Homologacao  $homologacao
     * @return \Illuminate\Http\Response
     */
    public function show(Homologacao $homologacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Homologacao  $homologacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Homologacao $homologacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Homologacao  $homologacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Homologacao $homologacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Homologacao  $homologacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Homologacao $homologacao)
    {
        //
    }
}
