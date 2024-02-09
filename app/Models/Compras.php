<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;
    protected  $fillable = [ 
        
    'valorTotalEstimado',
    'valorTotalHomologado',
    'numeroCompra' ,
    'orgaoSubRogado' ,
    'ufNome' ,
    'codigoUnidade', 
    'nomeUnidade',
    'ufSigla' ,
    'municipioNome',
    'codigoIbge' ,
    'unidadeSubRogada' ,
    'dataAtualizacao' ,
    'dataInclusao' ,
    'dataPublicacaoPncp' ,
    'modalidadeId',
    'srp',
    'anoCompra',
    'sequencialCompra',
    'cnpj' ,
    'razaoSocial',
    'poderId',
    'esferaId',
    //'amparoLegal'amparoLegal'],
    'codigo',
    'nome',
    'descricao',
    'dataAberturaProposta' ,
    'dataEncerramentoProposta',
    'informacaoComplementar',
    'processo',
    'objetoCompra' ,
    'linkSistemaOrigem' ,
    'justificativaPresencial',
    'existeResultado',
    'numeroControlePNCP',
    'modalidadeNome' ,
    'orcamentoSigilosoCodigo' ,
    'orcamentoSigilosoDescricao' ,
    'situacaoCompraId' ,
    'situacaoCompraNome' ,
    'tipoInstrumentoConvocatorioCodigo',
    'tipoInstrumentoConvocatorioNome' ,
    'modoDisputaId',
    'modoDisputaNome' ,
    'usuarioNome',

];
}
