@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'listarcompras'
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
          <h3 class="left">Compras</h3>
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
                
                placeholder="Buscar Compras"
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
            
        
          <table class="table-responsive">
            <thead class=" text-primary">
              <tr>
                <th></th>
              <th>valorTotalEstimado</th>
              <th>valorTotalHomologado</th>
              <th>numeroCompra</th>
              <th>orgaoSubRogado</th>
              <th>ufNome</th>
              <th>codigoUnidade</th>
              <th>nomeUnidade</th>
              <th>ufSigla</th>
              <th>municipioNome</th>
              <th>codigoIbge</th>
              <th>unidadeSubRogada</th>
              <th>dataAtualizacao</th>
              <th>dataInclusao</th>
              <th>dataPublicacaoPncp</th>
              <th>modalidadeId</th>
              <th>srp</th>
              <th>anoCompra</th>
              <th>sequencialCompra</th>
              <th>orgaoEntidade</th>
              <th>cnpj</th>
              <th>razaoSocial</th>
              <th>poderId</th>
              <th>esferaId</th>
              <th>amparoLegal</th>
              <th>codigo</th>
              <th>nome</th>
              <th>descricao</th>
              <th>dataAberturaProposta</th>
              <th>dataEncerramentoProposta</th>
              <th>informacaoComplementar</th>
              <th>processo</th>
              <th>objetoCompra</th>
              <th>linkSistemaOrigem</th>
              <th>justificativaPresencial</th>
              <th>existeResultado</th>
              <th>numeroControlePNCP</th>
              <th>modalidadeNome</th>
              <th>orcamentoSigilosoCodigo</th>
              <th>orcamentoSigilosoDescricao</th>
              <th>situacaoCompraId</th>
              <th>situacaoCompraNome</th>
              <th>tipoInstrumentoConvocatorioCodigo</th>
              <th>tipoInstrumentoConvocatorioNome</th>
              <th>modoDisputaId</th>
              <th>modoDisputaNome</th>
              <th>usuarioNome</th>
               
              </tr>
            </thead>
    
            <tbody>
              <tr>
               
                @foreach ($compras as $compra)
                <td><a href="{{ route('admin.compras.item', $compra->id) }}">#{{$compra->id}}</a></td>
                


<td>{{ $compra->valorTotalEstimado;}} </td>
<td>{{ $compra->valorTotalHomologado;}}</td>
<td>{{ $compra->numeroCompra;}}</td>
<td>{{ $compra->orgaoSubRogado;}}</td>
<td>{{ $compra->ufNome;}}</td>
<td>{{ $compra->codigoUnidade;}}</td>
<td>{{ $compra->nomeUnidade;}}</td>
<td>{{ $compra->ufSigla;}}</td>
<td>{{ $compra->municipioNome;}}</td>
<td>{{ $compra->codigoIbge;}}</td>
<td>{{ $compra->unidadeSubRogada;}}</td>
<td>{{ $compra->dataAtualizacao;}}</td>
<td>{{ $compra->dataInclusao;}}</td>
<td>{{ $compra->dataPublicacaoPncp;}}</td>
<td>{{ $compra->modalidadeId;}}</td>
<td>{{ $compra->srp;}}</td>
<td>{{ $compra->anoCompra;}}</td>
<td>{{ $compra->sequencialCompra;}}</td>
<td>{{ $compra->orgaoEntidade;}}</td>
<td>{{ $compra->cnpj;}}</td>
<td>{{ $compra->razaoSocial;}}</td>
<td>{{ $compra->poderId;}}</td>
<td>{{ $compra->esferaId;}}</td>
<td>{{ $compra->amparoLegal;}}</td>
<td>{{ $compra->codigo;}}</td>
<td>{{ $compra->nome;}}</td>
<td>{{ $compra->descricao;}}</td>
<td>{{ $compra->dataAberturaProposta;}}</td>
<td>{{ $compra->dataEncerramentoProposta;}}</td>
<td>{{ $compra->informacaoComplementar;}}</td>
<td>{{ $compra->processo;}}</td>
<td>{{ $compra->objetoCompra;}}</td>
<td>{{ $compra->linkSistemaOrigem;}}</td>
<td>{{ $compra->justificativaPresencial;}}</td>
<td>{{ $compra->existeResultado;}}</td>
<td>{{ $compra->numeroControlePNCP;}}</td>
<td>{{ $compra->modalidadeNome;}}</td>
<td>{{ $compra->orcamentoSigilosoCodigo;}}</td>
<td>{{ $compra->orcamentoSigilosoDescricao;}}</td>
<td>{{ $compra->situacaoCompraId;}}</td>
<td>{{ $compra->situacaoCompraNome;}}</td>
<td>{{ $compra->tipoInstrumentoConvocatorioCodigo;}}</td>
<td>{{ $compra->tipoInstrumentoConvocatorioNome;}}</td>
<td>{{ $compra->modoDisputaId;}}</td>
<td>{{ $compra->modoDisputaNome;}}</td>
<td>{{ $compra->usuarioNome;}}</td>


             
               
      <td>              
          <form action="{{route('admin.compras.categoria.item')}}"  method="POST" enctype="multipart/form-data">
                @csrf

              <input type="hidden" name="id_usuario" value="{{auth()->user()->id}}">
              <input type="hidden" name="id_compra" value="{{$compra->id}}">
              
             
              <select name="id_categoria" data-dropup-auto="false" >
                    <option value="" disabled selected>Adicione a uma categoria</option>
                  @foreach($categorias as $c)
                    <option value="{{$c->id}}">{{ $c->nome }}</option>
                  @endforeach
      
              </select>
              <input type="submit" id="add" class="btn btn-primary"  value="adicionar"></button>
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
{{$compras->links('custom.pagination')}}
</div>
</div>

</div>

</div>




@endsection
