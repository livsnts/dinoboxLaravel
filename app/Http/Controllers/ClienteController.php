<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Cliente::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomeCliente' => 'required|string|max:100',
            'telefoneCliente' => 'required|string|max:11',
            'cpfCliente' => 'required|string|unique:clientes,cpfCliente|max:11',
            'emailCliente' => 'required|email|unique:clientes,emailCliente',
            'senhaCliente' => 'required|string|min:6',
            'logradouroCliente' => 'required|string|max:200',
            'numeroResidenciaCliente' => 'required|integer',
            'bairroCliente' => 'required|string|max:100',
        ]);

        $validated['senhaCliente'] = Hash::make($validated['senhaCliente']);

        $cliente = Cliente::create($validated);
        return response()->json($cliente, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        return response()->json($cliente, 200);
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
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return response()->json($cliente, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cliente::destroy($id);
        return response()->json(null, 204);
    }
}
