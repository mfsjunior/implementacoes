<!-- Modal Structure -->
<div id="edite-{{$categoria->id}}" class="modal">
    <div class="modal-content">
     
      <div class="container">
        <div class="row">
            <h2> Editando categorias</h2>
          
        </div> 
        

        <form action="{{route('admin.pncp.categoria.edite')}}" method="POST" enctype="multipart/form-data">
             @csrf <!-- diretiva de proteção -->

            <input name="id" type="hidden" value="{{$categoria->id}}">
            <div class="row">
                  <div class="input-field col s12">
                    <input name='nome' value='{{$categoria->nome}}' type="text" class="validate">
                    <label for="first_name">Nome da categoria</label>
                  </div>
                  
                </div>
                <div class="row">
                  <div class="input-field col s6">
                    <textarea  name='descricao'  type="text" class="materialize-textarea">{{$categoria->descricao}}</textarea>
                    <label >Descrição</label>
                  </div>
                </div>
                
                <div class="row">
                  <div class="input-field col s12">
                 
                    <select name="categoria">
                        <option value="{{$categoria->categoria}}" selected>{{$categoria->categoria == 1? "CONTRATOS": "COMPRAS"}}</option>
                      
                        @if ($categoria->categoria == 1))
                          <option value="2">Compras</option>
                        @endif

                        @if ($categoria->categoria == 2))
                          <option value="1">Contratos</option>
                        @endif
                      
                      </select>
                      <label for="categorias"></label>
                  </div>
                </div>

            <button type="submit" class="waves-effect waves-green btn red right">salvar</button>
            <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a>
        </form>
    </div>
    


</div>
  </div>