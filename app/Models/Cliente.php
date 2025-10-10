<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nomeCliente',
        'telefoneCliente',
        'cpfCliente',
        'emailCliente',
        'senhaCliente',
        'logradouroCliente',
        'numeroResidenciaCliente',
        'bairroCliente',
    ];

    protected $hidden = [
        'senhaCliente',
    ];
}
