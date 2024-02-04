@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'item'
])
@section('titulo', 'Contrato individual')

@section('conteudo2')

<div class="content">
    <div class="row">
    @if($mensagem = Session::get('sucesso'))
    
    
    <div class="green">
        
          <p>{{$mensagem}}</p>

    </div>
       
    @endif

    

    <div class="col-md-12">

      <div class="row titulo ">    
      <h3 class="left">Contrato CNPJ -  {{$contrato->cnpj}}</h3>
      
    </div>
     
        <div class="card">
            <div class="card-header">
                <h4 class="card-title item">{{$contrato->unidade_responsavel . " -  CNPJ". $contrato->cnpj}}</h4>

                
            </div>
  
            <div class="card-body">

            <table class="item-pncp">
                
        
                <tbody>
                  <tr>
                    <td class="principal">UASG</td>
                    <td>{{$contrato->uasg}}</td>
                   
                  </tr>
                  <tr>
                    <td class="principal">ID ITEM PCA</td>
                    <td>{{$contrato->id_item_pca}}</td>
                   
                  </tr>
                  <tr>
                    <td class="principal">CATEGORIA ITEM</td>
                    <td>{{$contrato->categoria_item}}</td>
                   
                  </tr>
                  <tr>
                    <td class="principal">IDENTIFICADOR FUTURA CONTRATAÇÃO</td>
                    <td>{{$contrato->identificador_futura_contratacao}}</td>
                   
                  </tr>
                  <tr>
                    <td class="principal">NOME FUTURA CONTRATACAO</td>
                    <td>{{$contrato->nome_futura_contratacao}}</td>
                   
                  </tr>
                  <tr>
                    <td class="principal">CATALOGO UTILIZADO</td>
                    <td>{{$contrato->catalogo_utilizado}}</td>  
                  </tr>
                  <tr>
                    <td class="principal">CLASSIFICAÇÃO CATALOGO</td>
                    <td>{{$contrato->classificacao_catalogo}}</td>  
                  </tr>
                  <tr>
                    <td class="principal">CÓDIGO CLASSIFICAÇÃO SUPERIOR</td>
                    <td>{{$contrato->codigo_classificacao_superior}}</td>  
                  </tr>
                  <tr>
                    <td class="principal">NOME CLASSIFICAÇÃO SUPERIOR</td>
                    <td>{{$contrato->nome_classificacao_superior}}</td>  
                  </tr>
                  <tr>
                    <td class="principal">CÓDIGO PDM ITEM</td>
                    <td>{{$contrato->codigo_pdm_item}}</td>  
                  </tr>
                  <tr>
                    <td class="principal">NOME PDM ITEM</td>
                    <td>{{$contrato->nome_pdm_item}}</td>  
                  </tr>
                  <tr>
                    <td class="principal">CODIGO ITEM</td>
                    <td>{{$contrato->codigo_item}}</td>  
                  </tr>
                  <tr>
                    <td class="principal">DESCRIÇÃO ITEM</td>
                    <td>{{$contrato->descricao_item}}</td>  
                  </tr>
                  <tr>
                    <td class="principal">UNIDADE DE FORNECIMENTO</td>
                    <td>{{$contrato->unidade_fornecimento}}</td>  
                  </tr>
                  
                  <tr>
                    <td class="principal">QUANTIDADE ESTIMADA</td>
                    <td>{{$contrato->quantidade_estimada}}</td>  
                  </tr>
                  <tr>
                    <td class="principal">VALOR UNITÁRIO</td>
                    <td>{{$contrato->valor_unitario_estimado}}</td>  
                  </tr>
                  <tr>
                    <td class="principal">VALOR ORÇAMENTÁRIO PREVISTO</td>
                    <td>{{$contrato->valor_orcamentario_estimado_exercicio}}</td>  
                  </tr>
                  <tr>
                    <td class="principal">DATA DESEJADA</td>
                    <td>{{$contrato->valor_orcamentario_estimado_exercicio}}</td>  
                  </tr>

                </tbody>
              </table>


  

     
        </div>
       
        <div class="row titulo ">              
          <h6 class="left"></h6>
          
        </div>

    
            </div>
        </div>
    </div>
</div>
@endsection