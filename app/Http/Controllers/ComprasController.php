<?php

namespace App\Http\Controllers;
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
        foreach ($dataArray as $item){
    
            
           $url2 = 'https://treina.pncp.gov.br/api/pncp/v1/orgaos/'.  $item["cnpj"] .'/compras/2023/1';

            //$url2 = 'https://treina.pncp.gov.br/api/pncp/v1/orgaos/00394460000141/compras/2023/1';
           // $responseItem = file_get_contents($url2);      
           // $compraPorCNPJ = json_decode($responseItem, true);


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url2);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); //get the code of request
            curl_close($ch);
            if($httpCode != 200) 
               echo  'No donuts for you.';
            if($httpCode == 200) //is ok?
                echo $item["cnpj"];
                echo  $output;
        }


/*
            foreach ($compraPorCNPJ as $key){
          

                //dd($compraPorCNPJ['valorTotalEstimado']);
                    $allCNPJ[] = array([
                        [
                                    'valorTotalEstimado' => $compraPorCNPJ['valorTotalEstimado'],
                                    'valorTotalHomologado' => $compraPorCNPJ['valorTotalHomologado'],
                        ]
                        ]);
            
             }


        $rankings = [];
        foreach ($allCNPJ as $result) {

            
            //dd($result['0']['0']['valorTotalEstimado']);
            $rankings[] = implode(', ', 
            ['"' .$result['0']['0']['valorTotalEstimado'] . '"',
             '"' . $result['0']['0']['valorTotalHomologado']. '"']

            );
        }
      }

        $rankings = Collection::make($rankings);
   
        $rankings->chunk(500)->each(function($ch) {
            $rankingString = '';
            foreach ($ch as $ranking) {
                $rankingString .= '(' . $ranking . '), ';
            }
            $rankingString = rtrim($rankingString, ", ");
                    
            
           try {
                \DB::insert("INSERT INTO compras (`valorTotalEstimado`, `valorTotalHomologado`) VALUES $rankingString ");
            } catch (\Exception $e) {
                print_r([$e->getMessage()]);
            }
        });
    

       /* 
        $timestamp = Carbon::now();
        
        foreach ($data as &$record) {
            $record['created_at'] = $timestamp;
            $record['updated_at'] = $timestamp;
        }

        Compras::insert($data);
        */


        return view('admin.compras.buscarcompras');
    }

}
