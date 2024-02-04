@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'listarcontratos'
])
@section('titulo', 'Meus Contratos Salvos')

@section('conteudo2')


<div class="content">
      

  
        
    @if($mensagem = Session::get('sucesso'))
    
    <div class="row aviso col s12">
    <div class="green">
        
          <p>{{$mensagem}}</p>

    </div>
  </div>
    @endif
 

    
      

   
        <div class="row titulo ">    
          <h3 class="left">Meus contratos</h3>
          <div class="create-category">
            <a  class="criarcat modal-trigger" href="#create">
              
              Criar Categoria
            </a>   
          </div>
        </div>

        @include('admin.pncp.categoria')

       <nav class="bg-gradient-blue">
        <div class="nav-wrapper">
          <form action="{{route('admin.pncp.meuscontratosfiltrados')}}"  method="POST" enctype="multipart/form-data">
            @csrf
           
            <div class="input-field">
                <input
                type="search"
                
                placeholder="Buscar Contratos"
                name="search"
                id="search" 
            >
              <label class="label-icon" for="search"><i class="material-icons">search</i></label>
              <i class="material-icons">close</i>

             
            </div>
          </form>
        </div>
      </nav>     


      @if ($contratos->count() == 0)

      <div class="container">
        <div class="row">
          <h3 class="sem-contratos"> Não foram encontrados dados para sua pesquisa</h3>
        </div>
      </div>

      @else
    

<div class="col-md-12">
     
        <div class="card">
        <div class="card-header">
          <div class="col-sm-12">
            
            <div class="filter-group right">
              
              <select style="width:200px;" id="mylist" onchange="filtragem()" >
                <option value="" disabled selected>Filtre por categoria</option>
                @foreach($categorias as $c)
                  <option>{{ $c->nome }}</option>
                @endforeach 
              </select>         
       
            </div>
           
          </div>
            
        </div>
        <div class="card-body">
            <div class="table">
            
        
          <table id="myTable" class="table">
            <thead class="text-primary">
              <tr>
                <th>Categoria</th>
                <th>#</th>
               <th> Unidade Responsável</th>
               <th> UASG</th>	
               <th> Id do item no PCA</th>	
               <th> Categoria do Item</th>
               <th> Descrição do Item</th>	
               <th> Unidade de Fornecimento</th>	
               <th> Quantidade Estimada	 </th>
               <th> Valor Unitário Estimado (R$)</th>	
               <th> Valor Total Estimado (R$)</th>	
               <th> Data Desejada</th>
               
               <th>Ação</th>
               
              </tr>
            </thead>
    
            <tbody>
              <tr>
               
                @foreach ($contratos as $contrato)
                <td>{{$contrato->nome}}</td>
                <td><a href="{{ route('admin.pncp.item', $contrato->id) }}">#{{$contrato->id}}</a></td>
                <td><a href="{{ route('admin.pncp.item', $contrato->id) }}">{{$contrato->unidade_responsavel}}</a></td>
                <td>{{$contrato->uasg}}</td>
                <td>{{$contrato->id_item_pca}}</td>
                <td>{{$contrato->categoria_item}}</td>
                
                <td>{{$contrato->descricao_item}}</td>
                
                <td>{{$contrato->unidade_fornecimento}}</td>
                <td>{{$contrato->quantidade_estimada}}</td>
                <td>{{$contrato->valor_unitario_estimado}}</td>
                <td>{{$contrato->valor_total_estimado}}</td>
          
                <td>{{$contrato->data_desejada}}</td>
                
                <td> 
                  <a href="#delete-{{$contrato->id}}" class="btn-floating modal-trigger  waves-effect waves-light red"><i class="material-icons">delete</i></a>
                  @include('admin.pncp.deletecontrato')
                </td>
            </td>
          </tr>
               @endforeach
           

              
            </tbody>
          </table>

        
 
        </div> 
       
                
                   
</div>


      
</div>


</div>


<div class="row center">

</div>
</div>


@endif

</div>

</div>



@endsection
