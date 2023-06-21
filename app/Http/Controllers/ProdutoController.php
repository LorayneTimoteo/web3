<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Loja;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    function listar() {
        $produtos = Produto::orderByRaw('nome, id')->paginate(5);
        return view('listagemProduto',
                    compact('produtos'));
       }
    
       function novo() {
         $produto = new Produto();
         $produto-> id = 0;
         $produto-> nome= "";
         $produto-> preco= "";
         $produto-> quantidade_estoque= "";
         $produto-> sku= "";
         $produto-> imagem= "";
         $lojas = Loja::orderBy('nome')->get();
         return view('frmProduto', compact('produto', 'lojas'));
       }
    

       function salvar(Request $request) {
    
         if ($request->input('id') == 0) {
           $produto = new Produto();
         } else {
           $produto = Produto::find($request->input('id'));
         }
         
         if ($request->hasFile('arquivo')) {
             $file = $request->file('arquivo');
             $upload = $file->store('public/imagens');
             $upload = explode("/", $upload);
             $tamanho = sizeof($upload);
             if ($produto->imagem != "") {
               Storage::delete("public/imagens/".$produto->imagem);
             }
             $produto->imagem = $upload[$tamanho-1];
         }
    
         $produto->nome = $request->input('nome');
         $produto->preco = $request->input('preco');
         $produto->quantidade_estoque = $request->input('quantidade_estoque');
         $produto->sku = $request->input('sku');
         $produto->loja_id = $request->input('loja_id');
       
         $produto->save();
         return redirect('produto/listar')
         ->with(['msg' => "Produto '$produto->nome' foi salva"]);
       }
    
    
    
       function salvarOld(Request $request) {
         $validated = $request->validate([
                 'nome' => 'required',
                 'preco' => 'required',
                 'quantidade_estoque' => 'required',
                 'sku' => 'required',
                 'imagem' => 'required',
                 'loja_id' => 'required|exists:loja,id'
             ]);
    
         if ($request->input('id') == 0) {
           $produto = new Produto();
         } else {
           $produto = Produto::find($request->input('id'));
         }
         $produto->nome = $request->input('nome');
         $produto->preco = $request->input('preco');
         $produto->autor_id = $request->input('autor_id');
         $produto->sku= $request->input('sku');
         $produto->imagem= $request->input('imagem');
         $produto->loja_id = $request->input('loja_id');
         $produto->save();
         return redirect('loja/listar');
       }
    
       function editar($id) {
         $produto = Produto::find($id);
         $lojas = Loja::orderBy('nome')->get();
         return view('frmProduto', compact('produto', 'lojas'));
       }
    
       function excluir($id) {
         $produto = Produto::find($id);
         $nome= $produto->nome;
         if ($produto->imagem != "") {
           Storage::delete("public/imagens/".$produto->imagem);
         }
    
         $produto->delete();
    
         return redirect('produto/listar')
            ->with(['msg' => "Produto $nome foi excluído"]);
       }
    
    
}