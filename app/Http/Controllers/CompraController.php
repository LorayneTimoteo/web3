<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Cliente;
use App\Models\Vendedor;
use App\Models\Loja;
use Illuminate\Http\Request;

class CompraController extends Controller
{
     function listar() {
    $compras = Compra::orderByRaw('data, id')->paginate(5);
    return view('listagemCompra',
                compact('compras'));
   }

   function novo() {
     $compra = new Compra();
     $compra->id = 0;
     $compra->data = now();
     $lojas = Loja::orderBy('id')->get();
     $clientes = Cliente::orderBy('id')->get();
     $vendedores = Vendedor::orderBy('id')->get();
     return view('frmCompra', compact('compra', 'clientes', 'vendedores','lojas'));
   }

   /*function salvar(CompraRequest $request) {

     if ($request->input('id') == 0) {
       $compra = new Compra();
     } else {
       $compra = Compra::find($request->input('id'));
     }
    

     $compra->valor = $request->input('valor');
     $compra->id_cliente = $request->input('id_cliente');
     $compra->data = $request->input('data');
     $compra->id_vendedor = $request->input('id_vendedor');
     $compra->id_loja = $request->input('id_loja');
     
    
     $compra->save();
     return redirect('compra/listar')
     ->with(['msg' => "Compra'$compra->titulo' foi salva"]);
   }


*/
   function salvar(Request $request) {
     $validated = $request->validate([
             'valor' => 'required',
             'data' => 'required',
             'id_cliente' => 'required|exists:cliente,id',
             'id_vendedor' => 'required|exists:vendedor,id',
             'id_loja' => 'required|exists:loja,id'             
         ]);

     if ($request->input('id') == 0) {
       $compra = new Compra();
     } else {
       $compra = Compra::find($request->input('id'));
     }
     $compra->valor = $request->input('valor');
     $compra->id_cliente = $request->input('id_cliente');
     $compra->data = $request->input('data');
     $compra->id_vendedor = $request->input('id_vendedor');
     $compra->id_loja = $request->input('id_loja');
 
     $compra->save();
     return redirect('compra/listar');
   }

   function editar($id) {
     $compra = Compra::find($id);
     $clientes = Cliente::orderBy('nome')->get();
     $lojas = Loja::orderBy('nome')->get();   
     $vendedores = Vendedor::orderBy('nome')->get();
     return view('frmCompra', compact('compra', 'clientes', 'vendedores','lojas'));
   }

   function excluir($id) {
     $compra = Compra::find($id);
     $valor = $compra->valor;
    

     $noticia->delete();

     return redirect('compra/listar')
        ->with(['msg' => "Compra $nome foi excluída"]);
   }
}