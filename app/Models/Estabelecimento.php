<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estabelecimento extends Model
{
    protected $fillable = [
            'statusEstabelecimento',
            'nomeEstabelecimento',
            'CNPJEstabelecimento',
            'enderecoEstabelecimento',
            'numeroEstabelecimento',
            'fotoEstabelecimento',
            'telefoneEstabelecimento',
            'instagramEstabelecimento',
            'horarioFuncionamento',
            'gerente_funcionario_idFuncionario'
    ];
}
