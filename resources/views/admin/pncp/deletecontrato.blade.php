<!-- Modal Structure -->
<div id="delete-{{$contrato->id}}" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">delete</i> Tem certeza?</h4>
      
        <div class="row">
                
            <p>Tem certeza que deseja excluir {{$contrato->unidade_responsavel}}?</p>

        </div> 
       

        <form action="{{route('admin.pncp.deletecontrato', $contrato->id)}}" method="POST">
            @method('DELETE') <!-- metodo da request -->
            @csrf <!-- diretiva de proteção -->
            <button type="submit" class="waves-effect waves-green btn red right">Excluir</button><a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a>
        </form>
    </div>

       

  </div>