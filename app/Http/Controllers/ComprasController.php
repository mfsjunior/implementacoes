<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\Compras;

use Illuminate\Database\Eloquent\Collection;


use Illuminate\Http\Request;

class ComprasController extends Controller
{


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
     //foreach ($dataArray as $item){
    
        for($i = 0 ; $i < 1; $i++){
           // dd($dataArray[0]['cnpj']);
            $url2 = 'https://treina.pncp.gov.br/api/pncp/v1/orgaos/'. $dataArray[$i]['cnpj'].'/compras/2023/1';

          // $url2 = 'https://pncp.gov.br/api/pncp/v1/orgaos/00394460000141/compras/2023/1';
         // $responseItem = file_get_contents($url2);      
         // $compraPorCNPJ = json_decode($responseItem, true);

        echo response(json_encode([
            'code' => '200',
            'message' => 'success',
            "resource" => url('https://pncp.gov.br/api/pncp/v1/orgaos/00394460000141/compras/2023/1')
        ], JSON_UNESCAPED_SLASHES))->header('Content-Type', "application/json");

       
        

      echo   $response = Http::get('https://pncp.gov.br/api/pncp/v1/orgaos/00394460000141/compras/2023/1');

        
     
          
    

               
       }

                
          // $datas = array_chunk($comprasData,1000);
          
               // foreach($datas as $data){
                 //   Compras::insert($data);        
                //}
            
                return view('admin.compras.buscarcompras');
            
            }

  
    
     
}
    
