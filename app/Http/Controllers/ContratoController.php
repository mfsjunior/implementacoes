<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {

        
            //vai receber o slug via parametro e vai buscar no banco um registro onde slug seja igual ao slug
        // $categoria = Categoria::find($id);
    
        $contrato = Contrato::where('id', $id)->first();
     
        
          return view('admin.pncp.item', compact('contrato'));
    
        
          
        
    
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function criarCategoria(Request $request)
    {
     
       
            $categoria = $request->all(); //precisa pegar os names identicos ao banco de dados
            $categoria = Categoria::create($categoria); //Salva no Banco 
           
    
            return redirect()->route('admin.pncp.buscar')->with('sucesso', 'Categoria criada com sucesso');
    
    
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(){
       
        //$contrato = $request->all(); //precisa pegar os names identicos ao banco de dados vindo na request
        $CSVvar = fopen("../storage/app/public/arquivos_baixados/06636765000107.csv", "r");

        $cnpj = '06636765000107';

       
        $file = fopen("../storage/app/public/arquivos_baixados/06636765000107.csv", "r");
    
       //$header = fgetcsv($file, 1000, ";");
    
      //  $users = [];
        $i = 1;
       
        while ($row = fgetcsv($file,1000 ,";")) {
            //$users[] = array_combine($header, $row);

            echo $i++;
            
          //   isset($row[7]) ? $row[7] : 'vazio';
       Contrato::create([      
             `updated_at` => NULL,
             `created_at` => NULL,    
             'unidade_responsavel' =>"$row[0]", 
             'uasg'=>$row[1], 
             'id_item_pca'=>$row[2], 
             'categoria_item'=>$row[3], 
             'identificador_futura_contratacao'=>$row[4], 
             'nome_futura_contratacao'=>$row[5], 
             'catalogo_utilizado'=>$row[6], 
             'classificacao_catalogo'=> isset($row[7]) ? $row[7] : 'vazio', 
             'codigo_classificacao_superior' =>$row[8], 
             'nome_classificacao_superior' =>$row[9], 
             'codigo_pdm_item' => $row[10], 
             'nome_pdm_item' => $row[11], 
             'codigo_item' =>$row[12],
             'descricao_item' =>$row[13], 
             'unidade_fornecimento' => $row[14], 
             'quantidade_estimada' =>$row[15],
             'valor_unitario_estimado' =>$row[16], 
             'valor_total_estimado' =>$row[17], 
             'valor_orcamentario_estimado_exercicio' =>$row[18], 
             'data_desejada' =>$row[19]
           
            ]);
            
            echo "<br>";
           
        }
    

    
        fclose($file);
    
        
    
        
         //Salva no Banco 

        // return redirect()->route('admin.listar')->with('sucesso', 'Dado inserido com sucesso');


    }

    /**
     * Display the specified resource.
     */
    public function show(Contrato $contrato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contrato $contrato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contrato $contrato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contrato $contrato)
    {
        //
    }


    public function listarPNCP(){
    
        
         $contratos = Contrato::paginate(5);//traz todos os registros
         $categorias =  Categoria::all();
        
         return view('admin.pncp.listar', compact('contratos', 'categorias'));

    }


    public function categoria(){

        return view('admin.pncp.categoria');

        
    }


    public function addUpdateData($id, Request $req)
    {
        $input = $req->all();
        return $id;
    }


}
