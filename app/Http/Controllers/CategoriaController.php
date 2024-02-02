<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }




    public function listarCategorias(){
    
        
    
    $categorias =  Categoria::where('id_usuario', auth()->user()->id)->get();
   
    /*  $categorias = DB::table('categoriaitem')
            ->join('categorias', 'categorias.id', '=', 'categoriaitem.id_categoria')
            ->select('categorias.*')
            ->where('categoriaitem.id_usuario', '=', auth()->user()->id)
            ->get();*/
     

        

        return view('admin.pncp.listarcategoria', compact('categorias'));

   }

   public function destroy($id){

        $categoria = Categoria::find($id);  
        $categoria->delete();
        return redirect()->route('admin.pncp.listarcategorias')->with('sucesso', 'Categoria excluida com sucesso');
    }



    public function atualizarCategoria(Request $request)
    {

       $categorias = $request->all(); //precisa pegar os names identicos ao banco de dados

        $categoria = Categoria::find($categorias['id']); //Salva no Banco 
        $categoria->update($categorias);
        
        return redirect()->route('admin.pncp.listarcategorias')->with('sucesso', 'atualizado com com sucesso"');
    }
}
