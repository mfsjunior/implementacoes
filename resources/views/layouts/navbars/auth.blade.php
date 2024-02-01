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
            <li class="{{ $elementActive == 'listar' || $elementActive == 'active' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                <i class="material-icons">assignment</i>
                
                
                    <p>
                            {{ __('CONTRATOS') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'listar' ? 'active' : '' }}">
                        <a href="{{ route('admin.pncp.buscar') }}">
                        <i class="material-icons">list</i>
                                <span class="sidebar-normal">{{ __(' Listar Contratos ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'categorias' ? 'active' : '' }}">
                           
                        <a href="{{ route('admin.pncp.listarcategorias') }}">
                        <i class="material-icons">list</i>
                                <span class="sidebar-normal">{{ __(' Listar Categorias ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'buscar' ? 'active' : '' }}">
                <a href="{{ route('admin.pncp.buscar') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('LISTAR CONTRATOS') }}</p>
                </a>
            </li>

           
            
          
        </ul>
    </div>
</div>
