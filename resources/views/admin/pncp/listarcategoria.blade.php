@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'categorias'
])
@section('titulo', 'Listagem de Categorias')

@section('conteudo2')


<div class="content">
      

  
        
    @if($mensagem = Session::get('sucesso'))
    
    <div class="row aviso col s12">
    <div class="green">
        
          <p>{{$mensagem}}</p>

    </div>
  </div>
    @endif
 


    @if ($categorias->count() == 0)


    <div class="row titulo categorias">    
      <h3 class="left">Categorias</h3>
      <div class="create-category">
        <a  class="criarcat modal-trigger" href="#create">
          
          Criar Categoria
        </a>   
      </div>
    </div>

    <div class="container">
      <div class="row">
        <h3 class="sem-contratos"> Você não tem categoria cadastrada</h3>
      </div>
    </div>
    @include('admin.pncp.categoria')

    @else
        <div class="row titulo categorias">    
          <h3 class="left">Categorias Cadastradas</h3>
          <div class="create-category">
            <a  class="criarcat modal-trigger" href="#create">
              
              Criar Categoria
            </a>   
          </div>
        </div>

        @include('admin.pncp.categoria')
      
        
         
        
         
       
    
     
  
        

<div class="col-md-12">
     
        <div class="card">
        <div class="card-header">
           
        </div>
        <div class="card-body">
            <div class="table">
            
        
          <table class="table">
            <thead class=" text-primary">
              <tr>
                <th>#</th>
               <th> Nome da Categoria</th>
               <th> Descrição</th>	
               <th> Ação</th>	
        
               
              </tr>
            </thead>
    
            <tbody>
              
               
                @foreach ($categorias as $categoria)
                <tr>
                <td></td>
                <td>{{$categoria->nome}}</td>
                <td>{{$categoria->descricao}}</td>
                <td>
                
                <a  href="#edite-{{$categoria->id}}" class="btn-floating modal-trigger  waves-effect waves-light orange"><i class="material-icons">mode_edit</i></a>
                @include('admin.pncp.edite')
                <a href="#delete-{{$categoria->id}}" class="btn-floating modal-trigger  waves-effect waves-light red"><i class="material-icons">delete</i></a>
                      @include('admin.pncp.delete')
                


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
