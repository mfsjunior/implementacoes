
<!-- Modal Structure -->
<div id="create" class="modal">
    <div class="modal-content">
      <h4>Nova categoria</h4>
    </div>
      

        <div class="container">

        <div class="row">
            <form action="{{route('admin.pncp.categoria.store')}}" class="col s12" method="GET" enctype="multipart/form-data">
                @csrf

              <input type="hidden" name="id_usuario" value="{{auth()->user()->id}}"> 
              <div class="row">
                <div class="input-field col s5">
                  <input placeholder="Nome da Categoria" id="nome" name="nome" type="text" class="validate">
                 
                </div>
              </div>
                
              <div class="row">
                <div class="input-field col s12">
                  <input id="descricao" placeholder="Descrição da categoria (opcional)" type="text" name="descricao" class="validate">
                  <label for="password"></label>
                </div>
              </div>
 
 
              <button type="submit" class="waves-effect waves-green btn green right">Cadastrar</button>
              <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a>

            </form>
          </div>

        </div>
</div>
  


