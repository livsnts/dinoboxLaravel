<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Produto::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'statusProduto' => 'required|string|max:20',
            'nomeProduto' => 'required|string|max:100',
            'descricaoProduto' => 'nullable|string|max:200',
            'precoProduto' => 'required|numeric|min:0',
            'fotoProduto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'estabelecimento_idEstabelecimento' => 'required|integer|exists:estabelecimentos,idEstabelecimento',
            'categoria_idCategoria' => 'required|integer|exists:categorias,idCategoria',
        ]);

        $produto = Produto::create($validated);
        return response()->json($produto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::findOrFail($id);
        return response()->json($produto, 200);
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
        $produto = Produto::findOrFail($id);
        $produto->update($request->all());
        return response()->json($produto, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produto::destroy($id);
        return response()->json(null, 204);
    }
}
