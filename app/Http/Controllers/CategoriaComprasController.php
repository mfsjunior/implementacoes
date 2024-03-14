<?php

namespace App\Http\Controllers;

use App\Models\CategoriaCompras;
use Illuminate\Http\Request;

class CategoriaComprasController extends Controller
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
    public function show(CategoriaCompras $categoriaCompras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoriaCompras $categoriaCompras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoriaCompras $categoriaCompras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){

        //tenho que mandar deletar o item quando deletar a categoria
        
        $categoria = CategoriaCompras::find($id);  
        $categoria->delete();
        return redirect()->route('admin.pncp.listarcategorias')->with('sucesso', 'Categoria excluida com sucesso');
    }

}
