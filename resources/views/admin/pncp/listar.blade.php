@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'listar'
])
@section('titulo', 'Listagem de Contratos')

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
          <h3 class="left">Contratos</h3>
          <div class="create-category">
            <a  class="criarcat modal-trigger" href="#create">
              
              Criar Categoria
            </a>   
          </div>
        </div>


      
        
         
        
          @include('admin.pncp.categoria')

       <nav class="bg-gradient-blue">
        <div class="nav-wrapper">
          <form>
           
            <div class="input-field">
                <input
                type="search"
                
                placeholder="Buscar Contratatos"
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

    
    

<div class="col-md-12">
     
        <div class="card">
        <div class="card-header">
            
        </div>
        <div class="card-body">
            <div class="table">
            
        
          <table class="table">
            <thead class=" text-primary">
              <tr>
                <th></th>
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
               
                    
          <form action="{{route('admin.pncp.categoria.item')}}"  method="POST" enctype="multipart/form-data">
                @csrf

              <input type="hidden" name="id_usuario" value="{{auth()->user()->id}}">
              <input type="hidden" name="id_contrato" value="{{$contrato->id}}">
              
             
              <select name="id_categoria" data-dropup-auto="false" >
                    <option value="" disabled selected>Adicione a uma categoria</option>
                  @foreach($categorias as $c)
                    <option value="{{$c->id}}">{{ $c->nome }}</option>
                  @endforeach
      
              </select>
              <input type="submit" id="add" class="btn btn-primary" onclick="addUpdateData(id)" value="adicionar"></button>
            </form>
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
{{$contratos->links('custom.pagination')}}
</div>
</div>

</div>

</div>




@endsection
