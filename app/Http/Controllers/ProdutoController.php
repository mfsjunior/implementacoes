<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Para não chamar o endereço inteiro, utilizo o namespace 
use App\Models\Produto;//importanto model 
use App\Models\Categoria;//importanto model 

use Illuminate\Support\Str;

class ProdutoController extends Controller
{
    
    public function index(){
        //return 'Index';

     $produtos = Produto::paginate(5);//traz todos os registros
     $categorias =  Categoria::all();
    return view('admin.produtos', compact('produtos', 'categorias'));



     //$produtos = Produto::paginate(3);//paginação

    // return view('gerencial.home', compact('produtos'));

      //posso usar a barra ou o ponto para  folder 
      //Lembre-se aqui nós podemos imprimir o HTML 
     // $empresa = "Mendes Licitações";
     // return view('gerencial.home', ['empresa' => $empresa]);
    }


    public function destroy($id){

        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('admin.produtos')->with('sucesso', 'Produto excluído com sucesso');
    }


    public function store(Request $request){
       
        $produto = $request->all(); //precisa pegar os names identicos ao banco de dados

        if($request->imagem){
         // $produto['imagem'] =  $request->imagem->store('produtos'); //recebo a imagem se ela existir e guardo o seu path no banco
         $produto['imagem'] = $request->imagem->store('produtos');
        }
        $produto['slug'] = Str::slug($request->nome); // gerar slug automaticamente usando laravel 
        $produto = Produto::create($produto); //Salva no Banco 

        return redirect()->route('admin.produtos')->with('sucesso', 'Produto cadastrado com sucesso!');


    }
}
