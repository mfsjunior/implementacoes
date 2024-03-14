<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\Compras;
use App\Models\Categoria;
use App\Models\CategoriaCompras;
use App\Models\CategoriaItemCompras;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Collection;


use Illuminate\Http\Request;

class ComprasController extends Controller
{



    public function index($id)
    {

        // $categoria = Categoria::find($id);
    
        $compras = Compras::where('id', $id)->first();
       
        $categorias =  Categoria::where('id_usuario', auth()->user()->id)
        ->where('categoria', 2)
        ->get();
     
        
          return view('admin.compras.item', compact('compras', 'categorias'));
    
        
          
        
    
        
    }

    public function listarCompras(){

        
    
        
    $url = 'https://treina.pncp.gov.br/api/pncp/v1/orgaos';
    
    // Fazendo a requisição para a API e obtendo os dados
    $response = file_get_contents($url);
       
    $dataArray = json_decode($response, true);
    
    // Verificando se a decodificação foi bem-sucedida
    //if ($dataArray !== null) {
        // Imprimindo a tabela HTML
      $i = 0;  
        // Cabeçalho da tabela
        $rankings = [];

        // Preenchendo a tabela com os dados do JSON
     foreach ($dataArray as $item){
    
     //   for($i = 0 ; $i < 800; $i++){
           // dd($dataArray[0]['cnpj']);
         echo    $url2 = 'https://pncp.gov.br/api/pncp/v1/orgaos/'. $item['cnpj'].'/compras/2023/1';

         // $url2 = 'https://pncp.gov.br/api/pncp/v1/orgaos/00394460000141/compras/2023/1';
         // $responseItem = file_get_contents($url2);      
         // $compraPorCNPJ = json_decode($responseItem, true);

        
   

        
     
          
    $response = Http::withoutVerifying()
        ->withHeaders(['Cache-Control' => 'no-cache'])
        ->withOptions(["verify"=>false])
        ->get($url2);

       //dd($response->status());
    if($response->status() != 404){
                    
                
                $comprasData[] = [
                                'valorTotalEstimado' => $response['valorTotalEstimado'],
                                'valorTotalHomologado' => $response['valorTotalHomologado'],
                                'numeroCompra' => $response['numeroCompra'],
                                'orgaoSubRogado' => $response['orgaoSubRogado'],
                                'ufNome' => $response['unidadeOrgao']['ufNome'],
                                'codigoUnidade' => $response['unidadeOrgao']['codigoUnidade'],
                                'nomeUnidade'=> $response['unidadeOrgao']['nomeUnidade'],
                                'ufSigla' => $response['unidadeOrgao']['ufSigla'],
                                'municipioNome' => $response['unidadeOrgao']['municipioNome'],
                                'codigoIbge' => $response['unidadeOrgao']['codigoIbge'],
                                'unidadeSubRogada' => $response['unidadeSubRogada'],
                                'dataAtualizacao' => $response['dataAtualizacao'],
                                'dataInclusao' => $response['dataInclusao'],
                                'dataPublicacaoPncp' => $response['dataPublicacaoPncp'],
                                'modalidadeId' => $response['modalidadeId'],
                                'srp' => $response['srp'],
                                'anoCompra' => $response['anoCompra'],
                                'sequencialCompra' => $response['sequencialCompra'],
                                //'orgaoEntidade' => $response['orgaoEntidade'],
                                'cnpj' => $response['orgaoEntidade']['cnpj'],
                                'razaoSocial' => $response['orgaoEntidade']['razaoSocial'],
                                'poderId'=> $response['orgaoEntidade']['poderId'],
                                'esferaId'=> $response['orgaoEntidade']['esferaId'],
                                //'amparoLegal'=> $response['amparoLegal'],
                                'codigo'=> $response['amparoLegal']['codigo'],
                                'nome'=> $response['amparoLegal']['nome'],
                                'descricao'=> $response['amparoLegal']['descricao'],
                                'dataAberturaProposta' => $response['dataAberturaProposta'],
                                'dataEncerramentoProposta'=> $response['dataEncerramentoProposta'],
                                'informacaoComplementar'=> $response['informacaoComplementar'],
                                'processo' => $response['processo'],
                                'objetoCompra' => $response['objetoCompra'],
                                'linkSistemaOrigem' => $response['linkSistemaOrigem'],
                                'justificativaPresencial' => $response['justificativaPresencial'],
                                'existeResultado' => $response['existeResultado'],
                                'numeroControlePNCP' => $response['numeroControlePNCP'],
                                'modalidadeNome' => $response['modalidadeNome'],
                                'orcamentoSigilosoCodigo' => $response['orcamentoSigilosoCodigo'],
                                'orcamentoSigilosoDescricao' => $response['orcamentoSigilosoDescricao'],
                                'situacaoCompraId' => $response['situacaoCompraId'],
                                'situacaoCompraNome' => $response['situacaoCompraNome'],
                                'tipoInstrumentoConvocatorioCodigo' => $response['tipoInstrumentoConvocatorioCodigo'],
                                'tipoInstrumentoConvocatorioNome' => $response['tipoInstrumentoConvocatorioNome'],
                                'modoDisputaId' => $response['modoDisputaId'],
                                'modoDisputaNome' => $response['modoDisputaNome'],
                                'usuarioNome'=> $response['usuarioNome'],
                                'created_at' => now()->format('Y-m-d H:i:s'),
                                'updated_at' => now()->format('Y-m-d H:i:s')
                            ];  
                    

                            $datas = array_chunk($comprasData,1000);

                            foreach($datas as $data){

                                Compras::insert($data);  
                                
                            
                            }
                    
                                        
                            echo "certo";       

            }else{

                echo "Está vazio";
            }

            echo $i++;
            echo '<br>';

            
            

        }
               
    return view('admin.compras.buscarcompras');
            
            }

    
    public function salvarCategoriaItem(Request $request)
        {
     
        //echo $request->collect('id_compra');
        $verifyExists = CategoriaItemCompras::where('id_usuario', auth()->user()->id)->where('id_compra', $request->collect('id_compra'))->exists();

       // dd($verifyExists);

        if($verifyExists )
        {
            
            return back()->withInput()->with('Aviso', 'Este item já foi adicionado');

        }else{
            $categoriaItem = $request->all(); //precisa pegar os names identicos ao banco de dados
            $categoriaItem = CategoriaItemCompras::create($categoriaItem); //Salva no Banco 
        
            return back()->withInput()->with('sucesso', 'Item adicionado com sucesso');
        }    
            
    
    
       
    }


    public function listarMinhasCompras(){
    

     
            
     
        $compras = DB::table('compras')
        ->join('categoriaitem_compras', 'categoriaitem_compras.id_compra', '=', 'compras.id')
        ->join('categorias', 'categorias.id', '=', 'categoriaitem_compras.id_categoria')
        ->distinct()
        ->where('categoriaitem_compras.id_usuario', '=', auth()->user()->id)       
        ->paginate(5);


        $categorias =  Categoria::where('id_usuario', auth()->user()->id)
        ->where('categoria', 2)
        ->get();

       // dd($compras);  
       $i = 0;
        foreach ($compras  as $compra){
            //em tempo de execução ele vai gerar o link atualizado
        
            if($compras[$i]->cnpj == $compra->cnpj){
            
            $url = 'https://pncp.gov.br/api/pncp/v1/orgaos/'. $compra->cnpj .'/compras/' . $compra->anoCompra.'/'. $compra->sequencialCompra . '/arquivos/' . $compra->tipoInstrumentoConvocatorioCodigo ;

               // https://pncp.gov.br/api/pncp/v1/orgaos/06652119000125/compras/2023/1/arquivos/
       
               
        
                 
           $response = Http::withoutVerifying()
               ->withHeaders(['Cache-Control' => 'no-cache'])
               ->withOptions(["verify"=>false])
               ->get($url);
                 $compras[$i]->url = $response->handlerStats()['url'];
                $i++;
         }
           


        }

        return view('/admin/compras/listarcompras')->with('compras', $compras)->with('categorias', $categorias);

    }


    public function deletaCompra($id_compra){


        //tem que ser o id do contrato
        $contrato =  CategoriaItemCompras::where('id_compra',$id_compra)
        ->where('id_usuario', auth()->user()->id)
        ->delete();
         
         return redirect()->route('admin.compras.minhascompras')->with('sucesso', 'Compra deletada com sucesso, essa ação não pode ser revertida');
     }


     public function listarComprasFiltradas(Request $request){
    
        $busca = $request->all();
       
        $compras = DB::table('compras')
        ->join('categoriaitem_compras', 'categoriaitem_compras.id_compra', '=', 'compras.id')
        ->join('categorias', 'categorias.id', '=', 'categoriaitem_compras.id_categoria')
        
        ->distinct()
        ->where('categoriaitem_compras.id_usuario', '=', auth()->user()->id)     
        ->where('objetoCompra', 'like', '%' . request('search') . '%')  
        ->orWhere('nomeUnidade', 'like', '%' . request('search') . '%')
        ->orWhere('ufSigla', 'like', '%' . request('search') . '%')
        ->orWhere('ufNome', 'like', '%' . request('search') . '%')
        ->orWhere('municipioNome', 'like', '%' . request('search') . '%')
        ->orWhere('compras.descricao', 'like', '%' . request('search') . '%')
        ->orWhere('modoDisputaNome', 'like','%' . request('search') . '%')
        ->orWhere('cnpj', 'like','%' . request('search') . '%')
        ->paginate(10);



        $categorias =  Categoria::where('id_usuario', auth()->user()->id)
        ->where('categoria', 2  )
        ->get();
   
     

        return view('/admin/compras/listarcomprasfiltradas')->with('compras', $compras)->with('categorias', $categorias);

    }
  
    
     
}
    
