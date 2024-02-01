<?php
//tem que importar todo mundo que está na rota
use Illuminate\Support\Facades\Route;
use App\Models\Contrato;
use App\Models\Categoria;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContratoController;
ini_set('display_errors', 1);
error_reporting(E_ALL);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/produtos', [ProdutoController::class, 'index']);
//foi comentado no final do tutorial, mas no começo dele, se faz necessário 
//Route::resource('produtos', ProdutoController::class);
//Route::resource('users', UserController::class);//aqui vai criar o recurso e me permitir salvar no banco

//Route::get('/', [SiteController::class, 'index'])->name('gerencial.index');
Route::get('/', [LoginController::class, 'index'])->name('login.form');


Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('gerencial.details');
Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('gerencial.categoria');
Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('gerencial.carrinho');
Route::post('/carrinho', [CarrinhoController::class, 'adicionaCarrinho'])->name('gerencial.addcarrinho');
Route::post('/remover', [CarrinhoController::class, 'removeCarrinho'])->name('gerencial.removecarrinho');
Route::post('/atualizar', [CarrinhoController::class, 'atualizarCarrinho'])->name('gerencial.atualizarcarrinho');

Route::get('/limpar', [CarrinhoController::class, 'limparCarrinho'])->name('gerencial.limparcarrinho');


//Autenticação do usuário e demais rotas
Route::view('/login',  'login.form')->name('login.form');//não passa por controller
Route::post('/auth',[LoginController::class, 'auth'])->name('login.auth') ;
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/register', [LoginController::class, 'create'])->name('login.create');
Route::post('/store', [UserController::class, 'store'])->name('users.store');
Route::post('/rules', [PasswordRequest::class, 'rules'])->name('password.request');


//ADMIN 

Route::get('/admin/dashboard', [DashBoardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'checkemail']);
Route::get('/admin/pncp', [DashBoardController::class, 'gestaoPNCP'])->name('admin.gestao');
Route::get('/admin/pncp/listar', [ContratoController::class, 'listarPNCP'])->name('admin.listar');
Route::get('/admin/pncp/store', [ContratoController::class, 'store'])->name('admin.pncp.store');//mudar para post
Route::get('/admin/produtos', [ProdutoController::class, 'index'])->name('admin.produtos');
Route::post('/admin/produto/store', [ProdutoController::class, 'store'])->name('admin.produto.store');
Route::delete('/admin/produto/delete/{id}', [ProdutoController::class, 'destroy'])->name('admin.produto.delete');

//individual  
Route::get('/admin/pncp/{id}', [ContratoController::class, 'index'])->name('admin.pncp.item');

//Categoria
Route::get('/admin/categoria', [ContratoController::class, 'categoria'])->name('admin.pncp.categoria');
Route::get('/admin/categorias', [CategoriaController::class, 'listarCategorias'])->name('admin.pncp.listarcategorias');

Route::get('/admin/categoria/store', [ContratoController::class, 'criarCategoria'])->name('admin.pncp.categoria.store');

Route::post('/admin/pncp/categoriaitem', [ContratoController::class, 'salvarCategoriaItem'])->name('admin.pncp.categoria.item');

Route::delete('/admin/pncp/delete/{id}', [CategoriaController::class, 'destroy'])->name('admin.pncp.delete');

Route::post('/admin/pncp/edite', [CategoriaController::class, 'atualizarCategoria'])->name('admin.pncp.categoria.edite');



//ADMIN search 
Route::get('/admin/pncp/listar', function () {
  
    // Check for search input
    if (request('search')) {
        $contratos = Contrato::where('unidade_responsavel', 'like', '%' . request('search') . '%')->paginate(15);
          $categorias =  Categoria::all();
    } else {
        $contratos = Contrato::paginate(5);
        $categorias =  Categoria::all();
        return view('/admin/pncp/listar')->with('contratos', $contratos)->with('categorias', $categorias);
    }

    return view('/admin/pncp/listar')->with('contratos', $contratos)->with('categorias', $categorias);
})->name('admin.pncp.buscar');



/*
Route::get('/gerencial/empresa', function (){
    return view('gerencial/empresa');
});

Route::match (['put', 'delete'], '/match', function(){
    return "Permite apenas acessos definidos";
});

Route::get('/produto/{id}/', function($id){
    return "O id do produto é: " .$id;
});

Route::get('/produto/{id}/{cat?}/', function($id, $cat = ''){
    return "O id do produto é: " .$id . " Cat: ". $cat;
});

Route::get('/news', function(){
    return view('news');
})->name('noticias');

Route::get('/novidades', function(){
    return redirect()->route('noticias');
});

Route::group([
        'prefix' => 'admin',
        'as' => 'admin.'
], function (){

    Route::get('dashboard', function(){
        return "Dashboard";
    })->name('dashboard');

    Route::get('users', function(){
        return "users";
    })->name('users');


    Route::get('clientes', function(){
        return "clientes";
    })->name('clientes');

  
});
*/