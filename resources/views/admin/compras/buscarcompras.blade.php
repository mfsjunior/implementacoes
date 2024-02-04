@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'buscarcompras'
])
@section('titulo', 'Buscar Compras Disponíveis')

@section('conteudo2')

<div class="content">
<div class="row container">

  <div class="col-md-12">
     
    <div class="card">
    <div class="card-header">
        
    </div>
    <div class="card-body">
        <div class="table">

  <table class="table">

    <tr>
          <th></th>
         <th> CNPJ</th>
         <th> razaoSocial</th>	
         <th>Ação</th>
         
        </tr>
      </thead>
      <thead class=" text-primary">
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
    
           // $url2 = 'https://treina.pncp.gov.br/api/pncp/v1/orgaos/'.  $item["cnpj"] .'/unidades';
          
            echo '<tr>';
            echo '<td>' . $i++ .'</td>';
            echo '<td>' . $item["cnpj"] . '</td>';
            echo '<td>' . $item['razaoSocial'] . '</td>';
            echo '<td>';
    
    //

echo "</td>";



 echo '</tr>';

       
    }
    
    // Fechando a tabela
    echo '</table>';
} else {
    // Se a decodificação falhar, imprima uma mensagem de erro
    echo "Erro ao decodificar JSON.";
}





?>
             
        </div>
      </div>
    </div>
  </div>
</div>
</div>       
       
</div>

</div>

@endsection
