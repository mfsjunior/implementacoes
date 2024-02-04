@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'carrinho'
])
@section('titulo', 'Carrinho')

@section('conteudo2')

<div class="content">
<div class="row container">

   
    @if($mensagem = Session::get('sucesso'))
    
    
    <div class="card green">
        <div class="card-content white-text">
          <span class="card-title">Parabéns</span>
          <p>{{$mensagem}}</p>
        </div>
       
      </div>
    @endif

    @if($mensagem = Session::get('aviso'))
    
    
    <div class="card blue">
        <div class="card-content white-text">
          <span class="card-title">Tudo bem!</span>
          <p>{{$mensagem}}</p>
        </div>
       
      </div>
    @endif


@if ($itens->count() == 0)

<div class="card orange">
    <div class="card-content white-text">
      <span class="card-title">Seu carrinho está vazio</span>
      <p>Aproveite nossas promoções</p>
    </div>
   
  </div>





@else
<h5>Seu carrinho possui {{$itens->count()}} produtos</h5>

<table class="striped">
    <thead>
      <tr>
          <th></th>
          <th>Nome</th>
          <th>Preço</th>
          <th>Quantidade</th>
          <th></th>

      </tr>
    </thead>

    <tbody>

        @foreach ($itens as $iten)
        <tr>
            <td><img src="{{$iten->attributes->imagem}}" alt="" width="70" class="responsive-img cicle"></td>
            <td>{{$iten->name}}</td>
            <td>R$ {{number_format($iten->price, 2, ',','.')}}</td>
           
        {{-- BTN atualizar --}}   
            <form action="{{route('gerencial.atualizarcarrinho')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <input name="id" type="hidden" value="{{$iten->id}}">
            <td><input style="width: 40px; font-weight:900" class="white center" min="1" type="number" name="quantity" value="{{$iten->quantity}}"></td>
            <td>
                <button class="btn-floating btn-large waves-effect waves-light orange"><i class="material-icons">refresh</i>
                </button>
        
            </form>

            
        {{-- BTN remover --}}   
           <form action="{{route('gerencial.removecarrinho')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="id" type="hidden" value="{{$iten->id}}">
                <button class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></button></td>
           </form>
          </tr>
            
        @endforeach
  
   
    </tbody>
  </table>


  

  <div class="card orange">
    <div class="card-content white-text">
      <span class="card-title"><h5>Total das suas compras:  R$ {{number_format(\Cart::getTotal(), 2, ',','.')}}</h5></span>
      <p>Pague em 12x sem juros</p>
    </div>
   
  </div>
  @endif



  <div class="row container center">
  
    <a  href="{{route('admin.dashboard')}}" class="btn waves-effect waves-light gray">Continuar comprando<i class="material-icons">arrow_back</i></a></td>
    <a href="{{route('gerencial.limparcarrinho')}}" class="btn waves-effect waves-light blue">Limpar carrinho<i class="material-icons">clear</i></a></button></td>
    <button class="btn waves-effect waves-light green">Finalizar Pedido carrinho<i class="material-icons">check</i></a></button></td>
   </div>
    


   
   
</div>
    



</div>

@endsection
