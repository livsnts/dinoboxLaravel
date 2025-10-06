<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estabelecimento;

class EstabelecimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Estabelecimento::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estabelecimentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'statusEstabelecimento' => 'required|string|max:20',
            'nomeEstabelecimento' => 'required|string|max:100',
            'CNPJEstabelecimento' => 'required|string|max:14|unique:estabelecimentos,CNPJEstabelecimento',
            'enderecoEstabelecimento' => 'required|string|max:200',
            'numeroEstabelecimento' => 'required|integer',
            'fotoEstabelecimento' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'telefoneEstabelecimento' => 'required|string|max:11',
            'instagramEstabelecimento' => 'nullable|string|max:100',
            'horarioFuncionamento' => 'nullable|string|max:200',
            'gerente_funcionario_idFuncionario' => 'required|integer|exists:funcionarios,idFuncionario'
        ]); 

        $estabelecimento = Estabelecimento::create($validated);
        return response()->json($estabelecimento, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $estabelecimento = Estabelecimento::findOrFail($id);
        return response()->json($estabelecimento, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $estabelecimento = Estabelecimento::findOrFail($id);
        $estabelecimento->update($request->all());
        return response()->json($estabelecimento, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Estabelecimento::destroy($id);
        return response()->json(null, 204);
    }
}
