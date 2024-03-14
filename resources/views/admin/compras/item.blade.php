@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'item'
])
@section('titulo', 'Compra Individual')

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
      <h3 class="left">Compras do CNPJ -  {{$compras->cnpj}}</h3>
      
    </div>
     
        <div class="card">
            <div class="card-header">
                <h4 class="card-title item">{{"Órgão - ". $compras->nomeUnidade}}</h4>

                
            </div>
            <span class="categoria-item">              
              <form action="{{route('admin.compras.categoria.item')}}"  method="POST" enctype="multipart/form-data">
                    @csrf
        
                  <input type="hidden" name="id_usuario" value="{{auth()->user()->id}}">
                  <input type="hidden" name="id_compra" value="{{$compras->id}}">
                  
                 
                  <select name="id_categoria" data-dropup-auto="false" >
                        <option value="" disabled selected>Adicione a uma categoria</option>
                      @foreach($categorias as $c)
                        <option value="{{$c->id}}">{{ $c->nome }}</option>
                      @endforeach
          
                  </select>
                  <input type="submit" id="add" class="btn btn-primary"  value="adicionar"></button>
                </form>
              </span>
  
            <div class="card-body">

            <table class="item-pncp">
              <tbody>
              <tr>
                <td class="principal">valor Total Estimado</td>
              <td>{{ $compras->valorTotalEstimado;}} </td>
            </tr>
            <tr>
              <td class="principal">valor Total Homologado</td>
              <td>{{ $compras->valorTotalHomologado;}}</td>
            </tr>
            <tr>
              <td class="principal">numero Compra</td>
              <td>{{ $compras->numeroCompra;}}</td>
            </tr>
            <tr>
              <td class="principal">orgao SubRogado</td>
              <td>{{ $compras->orgaoSubRogado;}}</td>
            </tr>
            <tr>
              <td class="principal">uf Nome</td>
              <td>{{ $compras->ufNome;}}</td>
            </tr>
            <tr>
              <td class="principal">codigo Unidade</td>
              <td>{{ $compras->codigoUnidade;}}</td>
            </tr>
            <tr>
              <td class="principal">nome Unidade</td>
              <td>{{ $compras->nomeUnidade;}}</td>
            </tr>
            <tr>
              <td class="principal">uf Sigla</td>
              <td>{{ $compras->ufSigla;}}</td>
            </tr>
            <tr>
              <td class="principal">municipio Nome</td>
              <td>{{ $compras->municipioNome;}}</td>
            </tr>
            <tr>
              <td class="principal">codigo Ibge </td>
              <td>{{ $compras->codigoIbge;}}</td>
            </tr>
            <tr>
              <td class="principal">unidade SubRogada</td>
              <td>{{ $compras->unidadeSubRogada;}}</td>
            </tr>
            <tr>
              <td class="principal">data Atualizacao</td>
              <td>{{ $compras->dataAtualizacao;}}</td>
            </tr>
            <tr>
              <td class="principal">dataInclusao</td>
              <td>{{ $compras->dataInclusao;}}</td>
            </tr>
            <tr>
              <td class="principal">data Publicacao Pncp</td>
              <td>{{ $compras->dataPublicacaoPncp;}}</td>
            </tr>
            <tr>
              <td class="principal">modalidade Id</td>
              <td>{{ $compras->modalidadeId;}}</td>
            </tr>
            <tr>
              <td class="principal">srp</td>
              <td>{{ $compras->srp;}}</td>
            </tr>
            <tr>
              <td class="principal">ano Compra</td>
              <td>{{ $compras->anoCompra;}}</td>
            </tr>
            <tr>
              <td class="principal">sequencial Compra</td>
              <td>{{ $compras->sequencialCompra;}}</td>
            </tr>
            <tr>
              <td class="principal">orgao Entidade</td>
              <td>{{ $compras->orgaoEntidade;}}</td>
            </tr>
            <tr>
              <td class="principal">cnpj</td>
              <td>{{ $compras->cnpj;}}</td>
            </tr>
            <tr>
              <td class="principal">razao Social</td>
              <td>{{ $compras->razaoSocial;}}</td>
            </tr>
            <tr>
              <td class="principal">poder Id</td>
              <td>{{ $compras->poderId;}}</td>
            </tr>
            <tr>
              <td class="principal">esfera Id</td>
              <td>{{ $compras->esferaId;}}</td>
            </tr>
            <tr>
              <td class="principal">amparo Legal</td>
              <td>{{ $compras->amparoLegal;}}</td>
            </tr>
            <tr>
              <td class="principal">codigo</td>
              <td>{{ $compras->codigo;}}</td>
            </tr>
            <tr>
              <td class="principal">NOME</td>
              <td>{{ $compras->nome;}}</td>
            </tr>
            <tr>
              <td class="principal">descricao</td>
              <td>{{ $compras->descricao;}}</td>
            </tr>
            <tr>
              <td class="principal">data Abertura Proposta</td>
              <td>{{ $compras->dataAberturaProposta;}}</td>
            </tr>
            <tr>
              <td class="principal">data Encerramento Proposta</td>
              <td>{{ $compras->dataEncerramentoProposta;}}</td>
            </tr>
            <tr>
              <td class="principal">informacao Complementar</td>
              <td>{{ $compras->informacaoComplementar;}}</td>
            </tr>
            <tr>
              <td class="principal">processo</td>
              <td>{{ $compras->processo;}}</td>
            </tr>
            <tr>
              <td class="principal">objeto Compra</td>
              <td>{{ $compras->objetoCompra;}}</td>
            </tr>
            <tr>
              <td class="principal">linkSistemaOrigem</td>
              <td>{{ $compras->linkSistemaOrigem;}}</td>
            </tr>
            <tr>
              <td class="principal">justificativa Presencial</td>
              <td>{{ $compras->justificativaPresencial;}}</td>
            </tr>
            <tr>
              <td class="principal">existe Resultado</td>
              <td>{{ $compras->existeResultado;}}</td>
            </tr>
            <tr>
              <td class="principal">numero Controle PNCP</td>
              <td>{{ $compras->numeroControlePNCP;}}</td>
            </tr>
            <tr>
              <td class="principal">modalidade Nome</td>
              <td>{{ $compras->modalidadeNome;}}</td>
            </tr>
            <tr>
              <td class="principal">orcamento Sigiloso Codigo</td>
              <td>{{ $compras->orcamentoSigilosoCodigo;}}</td>
            </tr>
            <tr>
              <td class="principal">orcamento Sigiloso Descricao</td>
              <td>{{ $compras->orcamentoSigilosoDescricao;}}</td>
            </tr>
            <tr>
              <td class="principal">situacao Compra Id</td>
              <td>{{ $compras->situacaoCompraId;}}</td>
            </tr>
            <tr>
              <td class="principal">situacao Compra Nome</td>
              <td>{{ $compras->situacaoCompraNome;}}</td>
            </tr>
            <tr>
              <td class="principal">tipo Instrumento Convocatorio Codigo</td>
              <td>{{ $compras->tipoInstrumentoConvocatorioCodigo;}}</td>
            </tr>
            <tr>
              <td class="principal">ID</td>
              <td>{{ $compras->tipoInstrumentoConvocatorioNome;}}</td>
            </tr>
            <tr>
              <td class="principal">modo Disputa Id</td>
              <td>{{ $compras->modoDisputaId;}}</td>
            </tr>
            <tr>
              <td class="principal">modo Disputa Nome</td>
              <td>{{ $compras->modoDisputaNome;}}</td>
            </tr>
            <tr>
              <td class="principal">usuario Nome</td>
              <td>{{ $compras->usuarioNome;}}</td>
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