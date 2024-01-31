
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'gestaopncp'
])
@section('titulo', 'Buscar Contratos')

@section('conteudo2')

<div class="content">
        <div class="row">
    @if($mensagem = Session::get('sucesso'))
    
    
    <div class="green">
        
          <p>{{$mensagem}}</p>

    </div>
       
    @endif


  
       
        <div class="row titulo ">              
          <h1 class="left">Contratos</h1>
          
        </div>

       <nav class="bg-gradient-blue">
        <div class="nav-wrapper">
          <form>
           
            <div class="input-field">
                <input
                type="search"
                
                placeholder="Find user here"
                name="search"
                id="search" 
                value="{{ request('search') }}"
            >
              <label class="label-icon" for="search"><i class="material-icons">search</i></label>
              <i class="material-icons">close</i>

             
            </div>
          </form>
        </div>
      </nav>     

      <div class="card z-depth-4 registros" >
        @include('admin.includes.mensagens')
      </div>
    

<div class="col-md-12">
 @forelse($contratos as $contrato)
        <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Contratos</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            
        
          <table class="table">
            <thead class=" text-primary">
              <tr>
                <th></th>
               <th> Unidade Responsável</th>
               <th> UASG</th>	
               <th> Id do item no PCA</th>	
               <th> Categoria do Item</th>	
               <th> Identificador da Futura Contratação</th>	
               <th> Nome da Futura Contratação</th>	
               <th> Catálogo Utilizado</th>	
               <th> Classificação do Catálogo</th>	
               <th> Código da Classificação Superior (Classe/Grupo)	</th>
               <th> Nome da Classificação Superior (Classe/Grupo)</th>	
               <th> Código do PDM do Item</th>
               <th> Nome do PDM do Item</th>
               <th> Código do Item</th>	
               <th> Descrição do Item</th>	
               <th> Unidade de Fornecimento</th>	
               <th> Quantidade Estimada	Valor </th>
               <th> Unitário Estimado (R$)</th>	
               <th> Valor Total Estimado (R$)</th>	
               <th> Valor orçamentário estimado para o exercício (R$)</th>	
               <th> Data Desejada</th>
               <th>Ação</th>
               
              </tr>
            </thead>
    
            <tbody>
              <tr>
               
                @foreach ($contratos as $contrato)
                <td>#{{$contrato->id}}</td>
                <td>{{$contrato->unidade_responsavel}}</td>
                <td>{{$contrato->uasg}}</td>
                <td>{{$contrato->id_item_pca}}</td>
                <td>{{$contrato->categoria_item}}</td>
                <td>{{$contrato->identificador_futura_contratacao}}</td>
                <td>{{$contrato->nome_futura_contratacao}}</td>
                <td>{{$contrato->catalogo_utilizado}}</td>
                <td>{{$contrato->classificacao_catalogo}}</td>
                <td>{{$contrato->codigo_classificacao_superior}}</td>
                <td>{{$contrato->nome_classificacao_superior}}</td>
                <td>{{$contrato->codigo_pdm_item}}</td>
                <td>{{$contrato->nome_pdm_item}}</td>
                <td>{{$contrato->codigo_item}}</td>
                <td>{{$contrato->descricao_item}}</td>
                <td>{{$contrato->quantidade_estimada}}</td>
                <td>{{$contrato->valor_unitario_estimado}}</td>
                <td>{{$contrato->valor_total_estimado}}</td>
                <td>{{$contrato->valor_orcamentario_estimado_exercicio}}</td>
                <td>{{$contrato->data_desejada}}</td>
                <td>
                   </a>
                      <a href="#delete-{{$contrato->id}}" class="btn-floating modal-trigger  waves-effect waves-light green"> <i class="material-icons">mode_edit</i></a></td>
                    
                
                      
              </tr>
    
            
              @endforeach
             

              
            </tbody>
          </table>

        
 
        </div> 
       
                
                   
</div>


      
</div>


</div>

</div>

<div class="row center">
{{$contratos->links('custom.pagination')}}
</div>

</div>

</div>

@empty


<div class="alert card red lighten-4 red-text text-darken-4">
    <div class="card-content">
        <p><i class="material-icons">report</i><span>O TERMO PESQUISADO NÃO FOI ENCONTRATO:</span> tente outro termo ou limpe a pesquisa</p>
    </div>
</div>
@endforelse



@endsection