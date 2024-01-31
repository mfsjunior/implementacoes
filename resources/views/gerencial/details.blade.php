@extends('gerencial.layout')

@section('title', 'Detalhes')

@section('conteudo')

<div class="row container">
<div class="col s12 m6">

    <img src="{{$produto->imagem}}" class="responsive-img">
</div>
<div class="col s12 m6">
    <h4> {{$produto->nome}}</h4>
    <h4> R$ {{number_format($produto->preco, 2, ',','.')}}</h4>
    <p> {{$produto->descricao}}</p>
    <p> Postador por: {{$produto->user->firstName}}
        Categoria: {{$produto->categoria->nome}}</p>

        <form action="{{ route('gerencial.addcarrinho')}}" method="POST" enctype="multipart/form-data">
            @csrf <!-- tem como funcão gerar um token invisivel ao usuário-->
            <input type="hidden" name="id" value="{{$produto->id}}">
            <input type="hidden" name="name" value="{{$produto->nome}}">
            <input type="hidden" name="price" value="{{$produto->preco}}">
            <input type="number" min="1" name="quantity" value="1">
            <input type="hidden" name="image" value="{{$produto->imagem}}">
            <button class="btn orange btn-large">Comprar</button>
        </form>
   
</div>
</div>
@endsection