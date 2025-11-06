<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nomeCliente');
            $table->string('telefoneCliente');
            $table->string('cpfCliente')->unique();
            $table->string('emailCliente')->unique();
            $table->string('senhaCliente');
            $table->string('logradouroCliente');
            $table->integer('numeroResidenciaCliente');
            $table->string('bairroCliente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_cliente');
    }
};
