<!-- Modal Structure -->
<div id="delete-{{$compra->id}}" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">delete</i> Tem certeza?</h4>
      
        <div class="row">
                
            <p>Tem certeza que deseja excluir {{$compra->cnpj}}?</p>

        </div> 
       

        <form action="{{route('admin.compras.deletecompra', $compra->id)}}" method="POST">
            @method('DELETE') <!-- metodo da request -->
            @csrf <!-- diretiva de proteção -->
            <button type="submit" class="waves-effect waves-green btn red right">Excluir</button><a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a>
        </form>
    </div>

       

  </div>