<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Para não chamar o endereço inteiro, utilizo o namespace 
use App\Models\Produto;//importanto model 
use App\Models\Categoria;//importanto model 

use Illuminate\Support\Facades\Gate;


class SiteController extends Controller
{
    public function index(){
        //return 'Index';

     //$produtos = Produto::all();//traz todos os registros

     $produtos = Produto::paginate(3);//paginação

     return view('gerencial.home', compact('produtos'));


    }

    public function details($slug){

        //vai receber o slug via parametro e vai buscar no banco um registro onde slug seja igual ao slug
      $produto = Produto::where('slug', $slug)->first();
     
      //Gate::authorize('ver-produto', $produto);//aqui define uma regra ( gate para o camarada ver somente se o produto for dele)
     // $this->authorize('verProduto', $produto); //passo a regra e o model
      if(Gate::allows('ver-produto', $produto)){//validando se o camarada pode ou não ver algo 
        return view('gerencial.details', compact('produto'));
      }
      if(Gate::denies('ver-produto', $produto)){
        return redirect()->route('gerencial.index');
      }
      
    
    }


    public function categoria($id){

        //vai receber o slug via parametro e vai buscar no banco um registro onde slug seja igual ao slug
        $categoria = Categoria::find($id);

      $produtos = Produto::where('id_categoria', $id)->paginate(3);
      //aqui traz somente quem está na condição 

        return view('gerencial.categoria', compact('produtos', 'categoria'));
    
    }


}
