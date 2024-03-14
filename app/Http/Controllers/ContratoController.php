<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Contrato;
use App\Models\Categoria;
use App\Models\CategoriaCompras;
use App\Models\CategoriaItem;
use Illuminate\Http\Request;
use App\Jobs\ProcessContratos;
use Illuminate\Support\Facades\Storage;

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
       
        $categorias =  Categoria::where('id_usuario', auth()->user()->id)
        ->where('categoria', 1)
        ->get();
     
        
          return view('admin.pncp.item', compact('contrato', 'categorias'));
    
        
          
        
    
        
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
    public function store(){
       
       /* //$contrato = $request->all(); //precisa pegar os names identicos ao banco de dados vindo na request
        $CSVvar = fopen("arquivos_baixados/06636765000107.csv", "r");

        $cnpj = '06636765000107';

       
        //$file = fopen("../storage/app/public/arquivos_baixados/06636765000107.csv", "r");
        $file = fopen("arquivos_baixados/06636765000107.csv", "r");
    
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
*/     
        ProcessContratos::dispatch();
       
       // url('/');


    


       //dd($files = Storage::allFiles());
       
       
     // $CSVvar = fopen( 'http://mendes-app.mendes/storage/arquivos_baixados/06636765000101.csv', "r");
       
    
       // return redirect()->route('admin.listar')->with('sucesso', 'Dado inserido com sucesso');
      //  return redirect()->route('admin.pncp.buscar')->with('sucesso', 'Na teoria está processando');


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
    
        //o listar daqui está no arquivo de ROTA
        
        // $contratos = Contrato::where('id_usuario', auth()->user()->id)->paginate(5);//traz os registros paginados 

   /*    $contratos = DB::table('contratos')
            ->join('categoriaitem', 'categoriaitem.id_contrato', '<>', 'contratos.id')
            ->select('contratos.*')
            ->where('categoriaitem.id_usuario', '=', auth()->user()->id)
            ->get();
            





            $contratos = DB::table('contratos')
            ->whereNot(function (Builder $query) {
                $query->select('categoriaitem')
                ->where('categoriaitem.id_contrato ', '= ',  'contratos.id')
                      ->Where('categoriaitem.id_usuario', '=', auth()->user()->id);
            })
            ->get();

*/          
         
        $categorias =  Categoria::where('id_usuario', auth()->user()->id)
        ->where('categoria', 1)
        ->get();
        
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


    public function salvarCategoriaItem(Request $request)
    {
     
       
            $categoriaItem = $request->all(); //precisa pegar os names identicos ao banco de dados
            $categoriaItem = CategoriaItem::create($categoriaItem); //Salva no Banco 
           
    
            return redirect()->route('admin.pncp.buscar')->with('sucesso', 'Item adicionado com sucesso');
    
    
       
    }



    public function listarContratos(){
    

     
            
     
        $contratos = DB::table('contratos')
        ->join('categoriaitem', 'categoriaitem.id_contrato', '=', 'contratos.id')
        ->join('categorias', 'categorias.id', '=', 'categoriaitem.id_categoria') 
        ->distinct()
        ->where('categoriaitem.id_usuario', '=', auth()->user()->id)       
        ->paginate(5);

       
        $categorias =  Categoria::where('id_usuario', auth()->user()->id)
        ->where('categoria', 1 )
        ->get();

        return view('/admin/pncp/listarcontratos')->with('contratos', $contratos)->with('categorias', $categorias);

    }



    public function listarContratosFiltrados(Request $request){
    
        $busca = $request->all();
       
        $contratos = DB::table('contratos')
        ->join('categoriaitem', 'categoriaitem.id_contrato', '=', 'contratos.id')
        ->join('categorias', 'categorias.id', '=', 'categoriaitem.id_categoria')
        
        ->distinct()
        ->where('categoriaitem.id_usuario', '=', auth()->user()->id)     
        ->where('unidade_responsavel', 'like', '%' . request('search') . '%')  
        ->orWhere('categoria_item', 'like', '%' . request('search') . '%')
        ->orWhere('nome_futura_contratacao', 'like', '%' . request('search') . '%')
        ->orWhere('nome_classificacao_superior', 'like', '%' . request('search') . '%')
        ->orWhere('nome_pdm_item', 'like', '%' . request('search') . '%')
        ->orWhere('cnpj', 'like','%' . request('search') . '%')
        ->paginate(10);


        $categorias =  Categoria::where('id_usuario', auth()->user()->id)
        ->where('categoria', 1  )
        ->get();
   


        return view('/admin/pncp/listarcontratosfiltrados')->with('contratos', $contratos)->with('categorias', $categorias);

    }


    public function deleteContrato($id_contrato){


       //tem que ser o id do contrato
       $contrato =  CategoriaItem::where('id_contrato',$id_contrato)
       ->where('id_usuario', auth()->user()->id)
       ->delete();
        
        return redirect()->route('admin.pncp.meuscontratos')->with('sucesso', 'Contrato deletado com sucesso, essa ação não pode ser revertida');
    }



}
