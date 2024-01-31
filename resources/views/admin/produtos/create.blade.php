<!-- Modal Structure -->
<div id="create" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">playlist_add_circle</i> Novo produto</h4>
      <form  action="{{route('admin.produto.store')}}" class="col s12" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id_user" value="{{auth()->user()->id}}"> <!-- pega o usuario autenticado -->
        <div class="row">
          <div class="input-field col s6">
            <input name="nome" placeholder="Placeholder" id="nome" type="text" class="validate">
            <label for="nome">Nome</label>
          </div>
          <div class="input-field col s6">
            <input name="preco" id="preco" type="number" class="validate">
            <label for="preco">Preço</label>
          </div>
          <div class="input-field col s12">
            <input name="descricao" id="descricao" type="text" class="validate">
            <label for="descricao">Descricao</label>
          </div>

          <div class="input-field col s6">
            <select name="id_categoria">
              <option value="" disabled selected>Choose your option</option>
             @foreach($categorias as $c)
              <option value="{{$c->id}}">{{ $c->nome }} </option>
            @endforeach

            </select>
            <label>Categoria</label>
          </div> 
          
          <div class="file-field input-field col s12">
            <div class="btn">
              <span>Imagem</span>
              <input name="imagem" type="file">
            </div>
            <div class="file-path-wrapper">
              <input name="imagem" class="file-path validate" type="text">
            </div>
          </div>

        </div> 
       
       
        <button type="submit" class="waves-effect waves-green btn green right">Cadastrar</button><br>
    </div>
    
  </form>
  </div>