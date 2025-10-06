<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormaPagamento;

class FormaPagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(FormaPagamento::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formapagamento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'statusFormaPagamento' => 'required|string|max:20',
            'nomeFormaPagamento' => 'required|string|max:20|unique:formas_pagamento,nomeFormaPagamento',
            'trocoPara' => 'nullable|numeric|min:0',
        ]);

        $forma = FormaPagamento::create($validated);
        return response()->json($forma, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $forma = FormaPagamento::findOrFail($id);
        return response()->json($forma, 200);
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
        $forma = FormaPagamento::findOrFail($id);
        $forma->update($request->all());
        return response()->json($forma, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FormaPagamento::destroy($id);
        return response()->json(null, 204);
    }
}
