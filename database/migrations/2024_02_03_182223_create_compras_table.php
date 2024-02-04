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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('valorTotalEstimado');
            $table->string('valorTotalHomologado');
            $table->string('numeroCompra');
            $table->string('orgaoSubRogado');
            //$table->string('unidadeOrgao: {
            $table->string('ufNome');
                $table->string('codigoUnidade');
                $table->string('nomeUnidade');
                $table->string('ufSigla');
                $table->string('municipioNome');
                $table->string('codigoIbge');
            $table->string('unidadeSubRogada');
            $table->string('dataAtualizacao');
            $table->string('dataInclusao');
            $table->string('dataPublicacaoPncp');
            $table->string('modalidadeId');
            $table->string('srp');
            $table->string('anoCompra');
            $table->string('sequencialCompra');
            $table->string('orgaoEntidade');
            $table->string('cnpj');
            $table->string('razaoSocial');
            $table->string('poderId');
            $table->string('esferaId');
            $table->string('amparoLegal');
            $table->string('codigo');
            $table->string('nome');
            $table->string('descricao');
            $table->string('dataAberturaProposta');
            $table->string('dataEncerramentoProposta');
            $table->string('informacaoComplementar');
            $table->string('processo');
            $table->string('objetoCompra');
            $table->string('linkSistemaOrigem');
            $table->string('justificativaPresencial');
            $table->string('existeResultado');
            $table->string('numeroControlePNCP');
            $table->string('modalidadeNome');
            $table->string('orcamentoSigilosoCodigo');
            $table->string('orcamentoSigilosoDescricao');
            $table->string('situacaoCompraId');
            $table->string('situacaoCompraNome');
            $table->string('tipoInstrumentoConvocatorioCodigo');
            $table->string('tipoInstrumentoConvocatorioNome');
            $table->string('modoDisputaId');
            $table->string('modoDisputaNome');
            $table->string('usuarioNome');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
