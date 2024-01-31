@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'gestaopncp'
])
@section('titulo', 'Gestão de Dados')

@section('conteudo2')

<div class="content">
<div class="row container">
<?php 
   
    // URL da API que você deseja consumir
    $url = 'https://treina.pncp.gov.br/api/pncp/v1/orgaos';
    
    // Fazendo a requisição para a API e obtendo os dados
    $response = file_get_contents($url);
    
    // Convertendo os dados para o formato JSON
    //$jsonData = json_decode($response, true);
    
    
    $dataArray = json_decode($response, true);
    
    // Verificando se a decodificação foi bem-sucedida
    if ($dataArray !== null) {
        // Imprimindo a tabela HTML
      $i = 0;  
        // Cabeçalho da tabela
       
        
       
    
        // Preenchendo a tabela com os dados do JSON
        foreach ($dataArray as $item){
    
            $url2 = 'https://treina.pncp.gov.br/api/pncp/v1/orgaos/'.  $item["cnpj"] .'/unidades';
          
            echo '<tr>';
            echo '<td>' . $i++ .'</td>';
            echo '<td>' . $item["cnpj"] . '</td>';
            echo '<td>' . $item['razaoSocial'] . '</td>';
            echo '<td>';
    
    //Parte download do arquivo 
    // Initialize a file URL to the variable
    //$url = 'https://treina.pncp.gov.br/api/pncp/v1/orgaos/00394460000141/pca/2022/csv/';
    $url_tratado = 'https://pncp.gov.br/api/pncp/v1/orgaos/'. $item["cnpj"] . '/pca/2023/csv/';
    $url =  $url_tratado;
     
    // Initialize the cURL session
    $ch = curl_init($url);
     
    // Initialize directory name where
    // file will be save
    $dir = 'storage/arquivos_baixados/';
     
    


    // Use basename() function to return
    // the base name of file
     $file_format = basename($url);
    // $file_name = '00394460000141' ;
     $file_name = $item["cnpj"] ;
         // Save file into file location
     $save_file_loc = $dir . $file_name . "." . $file_format;
     
    // Open file
 $fp = fopen($save_file_loc, 'wb');
     
   // It set an option for a cURL transfer
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// Essa foi a raiz do problema. Ao trazer para o laravel, precisei tirar a verficação do HTTPS
     /* 
   dd( $response2 = file_get_contents($url2));
        $dataArray2 = json_decode($response2, true);
        if ($dataArray2 !== null) {

        foreach ($dataArray2 as $itemSubUnidade) {
          echo " - " ;  
          echo $itemSubUnidade["codigoUnidade"] .'-';
          echo $itemSubUnidade["nomeUnidade"] .'-';
          echo $itemSubUnidade["municipio"]["id"].'-' ;
          echo $itemSubUnidade["municipio"]["uf"]["siglaUF"].'-' ;
          echo $itemSubUnidade["municipio"]["uf"]["nomeUF"].'-' ;
          echo $itemSubUnidade["municipio"]["nome"].'-' ;
          
          echo $itemSubUnidade["dataInclusao"].'-' ;
          echo $itemSubUnidade["dataAtualizacao"].'<br>' ;
         

          



          }





          }else{
            echo "Órgão/entidade não possui unidades";
          }
             
           echo "</td>";

       
*/
// Perform a cURL session

//curl_exec($ch));
echo "<td>";
 if( curl_exec($ch)){
  echo 'Arquivo Baixado <i class="fa-solid fa-check-double"></i>';
}else{
  echo "Erro ao baixar o arquivo";
}


echo "</td>";
// Closes a cURL session and frees all resources
curl_close($ch);
 
// Close file
fclose($fp);


 echo '</tr>';

        if (++$i == 2) break;
    }
    
    // Fechando a tabela
    echo '</table>';
} else {
    // Se a decodificação falhar, imprima uma mensagem de erro
    echo "Erro ao decodificar JSON.";
}





?>
             
              </tbody>  
            </table>  

       
</div>

</div>

@endsection
