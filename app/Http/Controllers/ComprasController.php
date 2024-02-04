<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Compras;


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
        
        // Preenchendo a tabela com os dados do JSON
        foreach ($dataArray as $item){
    
           // $url2 = 'https://treina.pncp.gov.br/api/pncp/v1/orgaos/'.  $item["cnpj"] .'/unidades';
          
           $data[] = array([
            [
                'valorTotalEstimado' => $item["cnpj"],
                'valorTotalHomologado' => $item['razaoSocial'],
            ]
        ]);
            
        }

    

        
        $timestamp = Carbon::now();
        
        foreach ($data as &$record) {
            $record['created_at'] = $timestamp;
            $record['updated_at'] = $timestamp;
        }

        Compras::insert($data);


        return view('admin.compras.buscarcompras');
    }
    //
}
