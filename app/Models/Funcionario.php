<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = [
            'statusFuncionario',
            'nomeFuncionario',
            'tipoFuncionario',
            'cpfFuncionario',
            'logradouroFuncionario',
            'numeroResidenciaFuncionario',
            'telefoneFuncionario',
            'emailFuncionario',
            'senhaFuncionario',
            'estabelecimento_idEstabelecimento'
	];

    protected $hidden = [
        'senhaFuncionario',
    ];
}
