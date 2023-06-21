<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompraController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\ItemcompraController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\ProdutoController;
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



Route::get('/', function () {
    return view('index');
})->middleware('App\Http\Middleware\CheckAuth')->name('home');

Route::get('/login', 'App\Http\Controllers\LoginController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@logar');
Route::get('/deslogar', 'App\Http\Controllers\LoginController@deslogar')->name('deslogar');


Route::get('/cliente/listar', [ClienteController::class, 'listar'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/cliente/novo', [ClienteController::class, 'novo'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/cliente/editar/{id}', [ClienteController::class, 'editar'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/cliente/excluir/{id}', [ClienteController::class, 'excluir'])->middleware('App\Http\Middleware\CheckAuth');
Route::post('/cliente/salvar', [ClienteController::class, 'salvar'])->middleware('App\Http\Middleware\CheckAuth');



Route::get('/vendedor/listar', [VendedorController::class, 'listar'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/vendedor/novo', [VendedorController::class, 'novo'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/vendedor/editar/{id}', [VendedorController::class, 'editar'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/vendedor/excluir/{id}', [VendedorController::class, 'excluir'])->middleware('App\Http\Middleware\CheckAuth');
Route::post('/vendedor/salvar', [VendedorController::class, 'salvar'])->middleware('App\Http\Middleware\CheckAuth');



Route::get('/endereco/listar', [EnderecoController::class, 'listar'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/endereco/novo', [EnderecoController::class, 'novo'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/endereco/editar/{id}', [EnderecoController::class, 'editar'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/endereco/excluir/{id}', [EnderecoController::class, 'excluir'])->middleware('App\Http\Middleware\CheckAuth');
Route::post('/endereco/salvar', [EnderecoController::class, 'salvar'])->middleware('App\Http\Middleware\CheckAuth');



Route::get('/loja/listar', [LojaController::class, 'listar'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/loja/novo', [LojaController::class, 'novo'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/loja/editar/{id}', [LojaController::class, 'editar'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/loja/excluir/{id}', [LojaController::class, 'excluir'])->middleware('App\Http\Middleware\CheckAuth');
Route::post('/loja/salvar', [LojaController::class, 'salvar'])->middleware('App\Http\Middleware\CheckAuth');


Route::get('/produto/listar', [ProdutoController::class, 'listar'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/produto/novo', [ProdutoController::class, 'novo'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/produto/editar/{id}', [ProdutoController::class, 'editar'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/produto/excluir/{id}', [ProdutoController::class, 'excluir'])->middleware('App\Http\Middleware\CheckAuth');
Route::post('/produto/salvar', [ProdutoController::class, 'salvar'])->middleware('App\Http\Middleware\CheckAuth');

Route::get('/compra/listar', [CompraController::class, 'listar'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/compra/novo', [CompraController::class, 'novo'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/compra/editar/{id}', [CompraController::class, 'editar'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/compra/excluir/{id}', [CompraController::class, 'excluir'])->middleware('App\Http\Middleware\CheckAuth');
Route::post('/compra/salvar', [CompraController::class, 'salvar'])->middleware('App\Http\Middleware\CheckAuth');




Route::get('/itemcompra/listarTodos', [ItemcompraController::class, 'listarTodos'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/itemcompra/novo', [ItemcompraController::class, 'novo'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/itemcompra/editar/{id}', [ItemcompraController::class, 'editar'])->middleware('App\Http\Middleware\CheckAuth');
Route::get('/itemcompra/excluir/{id}', [ItemcompraController::class, 'excluir'])->middleware('App\Http\Middleware\CheckAuth');
Route::post('/itemcompra/salvar', [ItemcompraController::class, 'salvar'])->middleware('App\Http\Middleware\CheckAuth');








/*

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/noticia/{id}', [NewsController::class, 'noticia']);
Route::get('/news/categoria/{id}', [NewsController::class, 'categoria']);



Route::get('/dashboard')



Route::get('/loja/logout', [LojaController::class, 'logout']);
Route::get('/loja/login', [LojaController::class, 'login']);
Route::get('/loja/cadastrar}', [LojaController::class, 'cadastrar']);

Route::get('/login', function () {
    return view('login');
})->name('loja.login');

Route::get('/produtos', function () {
    return view('produtos');
})->name('loja.produtos');

Route::get('/vendedores', function () {
    return view('vendedores');
})->name('loja.vendedores');*/