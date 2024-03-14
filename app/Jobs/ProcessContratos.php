<?php

namespace App\Jobs;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Contrato;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Routing\UrlGenerator;

class ProcessContratos implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //aqui estará a lógica do meu Jobs
         
        //$contrato = $request->all(); //precisa pegar os names identicos ao banco de dados vindo na request
       // $CSVvar = fopen("../storage/app/public/arquivos_baixados/arquivos_baixados/06636765000107.csv", "r");

        $cnpj = '06636765000107';
       
        $directories = Storage::allFiles('arquivos_baixados');
        foreach($directories as $diretorio)
        {

    
             $url =  URL::to('/'). '/storage/' . $diretorio;
       
         
            $file = fopen( $url, "r");
 
            //$file = fopen( 'http://mendes-app.mendes/storage/arquivos_baixados/06636765000101.csv', "r");
      
       //$header = fgetcsv($file, 1000, ";");
   
        $i = 1;
       
        while ($row = fgetcsv($file,1000 ,";")) {  
          //   isset($row[7]) ? $row[7] : 'vazio';
        Contrato::create([      
                `updated_at` => NULL,
                `created_at` => NULL,    
                'unidade_responsavel' => isset($row[0]) ? $row[0]: "vazio",
                'uasg'=> isset($row[1]) ? $row[1] : 'vazio', 
                'id_item_pca'=> isset($row[2]) ? $row[2] : 'vazio', 
                'categoria_item'=> isset($row[3]) ? $row[3] : 'vazio', 
                'identificador_futura_contratacao'=> isset($row[4]) ? $row[4] : 'vazio', 
                'nome_futura_contratacao'=> isset($row[5]) ? $row[5]: "vazio", 
                'catalogo_utilizado'=> isset($row[6]) ? $row[6]: "vazio",
                'classificacao_catalogo'=> isset($row[7]) ? $row[7] : 'vazio', 
                'codigo_classificacao_superior' =>isset($row[8]) ? $row[8] : 'vazio', 
                'nome_classificacao_superior' =>isset($row[9]) ? $row[9] : 'vazio', 
                'codigo_pdm_item' => isset($row[10]) ? $row[10] : 'vazio', 
                'nome_pdm_item' => isset($row[11]) ? $row[11] : 'vazio', 
                'codigo_item' =>isset($row[12]) ? $row[12] : 'vazio',
                'descricao_item' => isset($row[13]) ? $row[13] : 'vazio', 
                'unidade_fornecimento' => isset($row[14]) ? $row[14] : 'vazio', 
                'quantidade_estimada' => isset($row[15]) ? $row[15] : 'vazio',
                'valor_unitario_estimado' => isset($row[16]) ? $row[16] : 'vazio', 
                'valor_total_estimado' =>isset($row[17]) ? $row[17] : 'vazio', 
                'valor_orcamentario_estimado_exercicio' =>isset($row[18]) ? $row[18] : 'vazio', 
                'data_desejada' =>isset($row[19]) ? $row[19] : 'vazio'
            
                ]);
            
          
           
        }
    }//fim do primeiro for
    
   
        fclose($file);
    
    }
}
