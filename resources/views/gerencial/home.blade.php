@extends('gerencial.layout')

@section('title', 'Essa é página Home')

@section('conteudo')



<div class="row container">

@foreach ($produtos as $produto)


    <div class="col s12 m4">
        <div class="card">
            <div class="card-image">
              <img src="{{$produto->imagem}}">
              <!-- @ can('verProduto', $produto)  só vai ver quem é autorizado pelo policy -->
              <a href="{{route('gerencial.details', $produto->slug)}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
                                
             

            </div>
            <div class="card-content">
                <span class="card-title">{{$produto->nome}} Title</span>
              <p> {{Str::limit($produto->descricao,20)}}</p>
            </div>
          </div>
    
  
    </div>
    
@endforeach

   
   
</div>


<div class="row  container center">
    {{$produtos->links('custom.pagination')}}
</div>

@endsection
