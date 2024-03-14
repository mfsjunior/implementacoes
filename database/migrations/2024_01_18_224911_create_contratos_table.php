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
        Schema::create('contratos', function (Blueprint $table) {
           $table->id();
           $table->timestamps();//cria duas colunas, created e updated
           $table->text('unidade_responsavel');
           $table->text('uasg');
           $table->text('id_item_pca');
           $table->text('categoria_item');
           $table->text('identificador_futura_contratacao'); 
           $table->text('nome_futura_contratacao');
           $table->text('catalogo_utilizado');  
           $table->text('classificacao_catalogo');  
           $table->text('codigo_classificacao_superior');   
           $table->text('nome_classificacao_superior'); 
           $table->text('codigo_pdm_item'); 
           $table->text('nome_pdm_item');   
           $table->text('codigo_item'); 
           $table->text('descricao_item');  
           $table->text('unidade_fornecimento');    
           $table->text('quantidade_estimada'); 
           $table->double('valor_unitario_estimado');
           $table->double('valor_total_estimado');    
           $table->double('valor_orcamentario_estimado_exercicio');
           $table->string('data_desejada');   
           $table->string('cnpj');      
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
