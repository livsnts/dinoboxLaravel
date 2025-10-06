<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Funcionario::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('funcionarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'statusFuncionario' => 'required|string|max:20',
            'nomeFuncionario' => 'required|string|max:100',
            'tipoFuncionario' => 'required|string|max:50',
            'cpfFuncionario' => 'required|string|max:11|unique:funcionarios,cpfFuncionario',
            'logradouroFuncionario' => 'required|string|max:200',
            'numeroResidenciaFuncionario' => 'required|integer',
            'telefoneFuncionario' => 'required|string|max:11',
            'emailFuncionario' => 'required|email|max:100|unique:funcionarios,emailFuncionario',
            'senhaFuncionario' => 'required|string|min:6|max:14',
            'estabelecimento_idEstabelecimento' => 'required|integer|exists:estabelecimentos,idEstabelecimento'
        ]);

        $funcionario = Funcionario::create($validated);
        return response()->json($funcionario, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return response()->json($funcionario, 200);
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
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->update($request->all());
        return response()->json($funcionario, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Funcionario::destroy($id);
        return response()->json(null, 204);
    }
}
