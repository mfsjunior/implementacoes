<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('/img/logo-small.png')}}">
                href="{{asset('css/style.css')}}"
            </div>
        </a>
        <a href="" class="simple-text logo-normal">
            {{ __('Projeto NOVO') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            <li class="{{ $elementActive == 'categorias' ? 'active' : '' }}">
                           
                <a href="{{ route('admin.pncp.listarcategorias') }}">
                <i class="material-icons">list</i>
                        <span class="sidebar-normal">{{ __(' Listar Categorias ') }}</span>
                    </a>
                </li>
            <li id="dest" class="{{ $elementActive == 'listar' || $elementActive == 'active' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
              
                
                
                    <p>
                            {{ __('CONTRATOS') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li  class="{{ $elementActive == 'listar' ? 'active' : '' }}">
                        <a href="{{ route('admin.pncp.buscar') }}">
                        <i class="material-icons">list</i>
                                <span class="sidebar-normal">{{ __(' Listar Contratos ') }}</span>
                            </a>
                        </li>
                       
                        <li class="{{ $elementActive == 'listarcontratos' ? 'active' : '' }}">
                            <a href="{{ route('admin.pncp.meuscontratos') }}">
                                <i class="material-icons">perm_contact_calendar</i>
                                <p>{{ __('Meus contratos') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
           



            <li class="{{ $elementActive == 'listar' || $elementActive == 'active' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#compras">
             
                
                    <p>
                            {{ __('COMPRAS') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="compras">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'listarcompras' ? 'active' : '' }}">
                        <a href="{{ route('admin.compras.buscar') }}">
                        <i class="material-icons">monetization_on</i>
                                <span class="sidebar-normal">{{ __(' Listar Compras ') }}</span>
                            </a>
                        </li>
                        
                        <li class="{{ $elementActive == 'minhascompras' ? 'active' : '' }}">
                            <a href="{{ route('admin.compras.minhascompras') }}">
                                <i class="material-icons">perm_contact_calendar</i>
                                <p>{{ __('Minhas Compras') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

           
            
          
        </ul>
    </div>
</div>
