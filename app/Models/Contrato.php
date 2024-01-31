<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
   
    protected  $fillable = [ 
        'id',
       'unidade_responsavel', 
       'uasg', 
       'id_item_pca', 
       'categoria_item', 
       'identificador_futura_contratacao', 
       'nome_futura_contratacao', 
       'catalogo_utilizado', 
       'classificacao_catalogo', 
       'codigo_classificacao_superior', 
       'nome_classificacao_superior', 
       'codigo_pdm_item', 
       'nome_pdm_item', 
       'codigo_item',
       'descricao_item', 
       'unidade_fornecimento', 
       'quantidade_estimada',
       'valor_unitario_estimado', 
       'valor_total_estimado', 
       'valor_orcamentario_estimado_exercicio', 
       'data_desejada',
       'cnpj',
   
    ];
}
