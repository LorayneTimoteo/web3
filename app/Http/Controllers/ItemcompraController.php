<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Compra;
use Illuminate\Http\Request;

class ItemcompraController extends Controller
{
    function listar() {
        $itemCompras = Itemcompra::orderByRaw('quantidade, id')->paginate(5);
        return view('listagemItemcompra',
                    compact('itemCompras'));
       }
    
       function novo() {
         $itemCompra = new Itemcompra();
         $itemCompra->id = 0;
         $itemCompra->quantidade =0;
         $produtos = Produto::orderBy('nome')->get();
         $compras = Compra::orderBy('valor')->get();
         return view('frmItemcompra', compact('Itemcompra','produtos','compras'));
       }
    
       function salvar(CompraRequest $request) {
    
         if ($request->input('id') == 0) {
           $itemCompra = new Itemcompra();
         } else {
           $itemCompra = Itemcompra::find($request->input('id'));
         }
        
    
         $itemCompra->quantidade = $request->input('quantidade');
         $itemCompra->id_cliente = $request->input('id_cliente');
         $itemCompra->preco_unitario = $request->input('preco_unitario');
         $itemCompra->id_produto = $request->input('id_produto');
         $itemCompra->id_compra = $request->input('id_compra');
         
        
         $itemCompra->save();
         return redirect('itemCompra/listar')
         ->with(['msg' => "itemCompra'$itemCompra->quantidade' foi salva"]);
       }
    
    
    
       function salvarOld(Request $request) {
         $validated = $request->validate([
                 'quantidade' => 'required',
                 'preco_unitario' => 'required',
                 'id_produto' => 'required|exists:produto,id',
                 'id_compra' => 'required|exists:compra,id'           
             ]);
    
         if ($request->input('id') == 0) {
           $itemCompra = new Itemcompra();
         } else {
           $itemCompra = Itemcompra::find($request->input('id'));
         }
         $itemCompra->quantidade = $request->input('quantidade');
         $itemCompra->preco_unitario = $request->input('preco_unitario');
         $itemCompra->id_produto = $request->input('id_produto');
         $itemCompra->id_compra = $request->input('id_compra');
         
     
         $itemCompra->save();
         return redirect('Itemcompra/listar');
       }
    
       function editar($id) {
         $itemCompra = Itemcompra::find($id);
         $produtos = Produto::orderBy('nome')->get();
         $compras = Compra::orderBy('valor')->get();   
         return view('frmItemcompra', compact('itemCompra', 'produtos', 'compras'));
       }
    
       function excluir($id) {
         $itemCompra = Itemcompra::find($id);
         $valor = $itemCompra->valor;
        
    
         $itemCompra->delete();
    
         return redirect('Itemcompra/listar')
            ->with(['msg' => "Compra $nome foi excluída"]);
       }
  
   
    
}
