<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    
    public function carrinhoLista(){
        $itens = \Cart::getContent();

        return  view('gerencial.carrinho', compact('itens'));
       
    }


    //aqui no paramêtro recebo uma requisição http via post
    public function adicionaCarrinho(Request $request){

        \Cart::add([
            'id' => $request->id, 
            'name' => $request->name, 
            'price' => $request->price, 
            'quantity' => abs( $request->quantity), 
            'attributes' => array (
                'image' => $request->image
                )
            ]);


             return redirect()->route('gerencial.carrinho')->with('sucesso', 'Produto adicionado com sucesso!');




    }

    public function removeCarrinho(Request $request)
    {

        \Cart::remove($request->id);
        return redirect()->route('gerencial.carrinho')->with('sucesso', 'Produto removido do carrinho com sucesso"');
    }

    public function atualizarCarrinho(Request $request)
    {

        \Cart::update($request->id, [
            'quantity'=> [
            'relative' => false,    
            'value' => abs( $request->quantity)]
        ]
    );
        return redirect()->route('gerencial.carrinho')->with('sucesso', 'atualizado com com sucesso"');
    }

    public function limparCarrinho(Request $request)
    {

        \Cart::clear();
        return redirect()->route('gerencial.carrinho')->with('Aviso', 'Seu carrinho está vazio!');
    }



}
