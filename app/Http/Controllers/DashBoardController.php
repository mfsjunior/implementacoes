<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Produto;
use DB;
class DashBoardController extends Controller
{
/*
    //caso eu não quera utilizar a rota como fonte do middleware, posso fazer isso direto na classe usando o construtor
    //posso plicar no método também, mais um, separo por vírgula >only('index')
    public function __contruct(){
        //$this->middleware('auth')->only('index');
        $this->middleware('auth')->except('index');//exceto index (acessa todos os outros / posso usar um array)
    }
  */  
    public function index(){

        $usuarios = User::all()->count();//contar os usuários
      
        // gráfico 1 - usuaparios - modo arbitrario, sem o uso do ORM
        $userData = User::select([
        DB::raw('YEAR(created_at) as ano'),// ano de criação
        DB::raw('COUNT(*) as total'),     //total naquele ano 
        ])
        ->groupBy('ano')
        ->orderBy('ano', 'asc')
        ->get();
        //preparar arrays
        foreach($userData as $user){

            $ano[] = $user->ano;
            $total[] = $user->total;
            

        }

        //formatar para o chartJS
        $userLabel = "'Comparativo de cadastro de usuários'";
        $userAno = implode(',', $ano);  
        $userTotal = implode(',', $total);

       //formatar gráfico 2 - categoria 
      // $catData = Categoria::all();pega tudo 
        $catData = Categoria::with('produtos')->get(); //vai la em categoria e busca o método produtos


       foreach($catData as $cat){
        //modo um de fazer 
        //$catNome[] = "'".$cat->nome."'";
        //$catTotal[] = Produto::where('id_categoria', $cat->id)->count();// busca os produtos dentro de uma categoria
        //quando há relacionamento, não preciso fazer um select dentro do outro 

        //modo 2 de fazer 
        $catNome[] = "'".$cat->nome."'";
        $catTotal[] = $cat->produtos->count(); // Neste momento, busco e conto todos os produtos dentro da categoria


       }

       //formatar para chartjs 
       $catLabel = implode(',', $catNome);
       $catTotal = implode(',', $catTotal);


       //em algum momento eu preciso refatorar e imprimir os meus relacionamentos 


        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));//chama dentro da pasta admin o arquivo s
    }


    public function gestaoPNCP(){
    
        //tem que apontar para o endereço e a pasta do blade 
        return view('admin.pncp.gestao');

    }


   


}
