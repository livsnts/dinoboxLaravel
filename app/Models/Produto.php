<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
	'statusProduto',
    'nomeProduto',
    'descricaoProduto',
    'precoProduto',
    'fotoProduto',
    'estabelecimento_idEstabelecimento',
    'categoria_idCategoria'
	];
}
