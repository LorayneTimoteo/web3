<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loja;
use App\Models\Endereco;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class LojaController extends Controller
{

    function listar() {
        $lojas = Loja::orderByRaw('nome, id')->paginate(5);
        return view('listagemLoja',
                    compact('lojas'));
       }
    
       function novo() {
         $loja = new Loja();
         $loja->id = 0;
         $loja->nome = "";
         $loja->cnpj = "";
         $loja->telefone = "";
         $loja->email = "";
         $loja->password = "";
         $enderecos = Endereco::orderBy('rua')->get();
         return view('frmLoja', compact('loja', 'enderecos'));
       }
    
       function salvar(Request $request) {
    
         if ($request->input('id') == 0) {
           $loja = new Loja();
         } else {
           $loja = Loja::find($request->input('id'));
         }
         /*
         if ($request->hasFile('arquivo')) {
             $file = $request->file('arquivo');
             $upload = $file->store('public/imagens');
             $upload = explode("/", $upload);
             $tamanho = sizeof($upload);
             if ($noticia->imagem != "") {
               Storage::delete("public/imagens/".$noticia->imagem);
             }
             $noticia->imagem = $upload[$tamanho-1];
         }*/
    
         $loja->nome = $request->input('nome');
         $loja->cnpj = $request->input('cnpj');
         $loja->telefone = $request->input('telefone');
         $loja->email = $request->input('email');
         $loja->password= $request->input('password');
         $loja->endereco_id = $request->input('endereco_id');
         $loja->save();
         return redirect('loja/listar')
         ->with(['msg' => "Loja '$loja->nome' foi salva"]);
       }
    
    
    
       function salvarOld(Request $request) {
         $validated = $request->validate([
                 'nome' => 'required',
                 'cnpj' => 'required',
                 'telefone' => 'required',
                 'email' => 'required',
                 'password' => 'required',
                 'endereco_id' => 'required|exists:endereco,id'
             ]);
    
         if ($request->input('id') == 0) {
           $loja = new Loja();
         } else {
           $loja = Loja::find($request->input('id'));
         }
         $loja->nome = $request->input('nome');
         $loja->cnpj = $request->input('cnpj');
         $loja->telefone = $request->input('telefone');
         $loja->email = $request->input('email');
         $loja->endereco_id = $request->input('endereco_id');
         $loja->password = $request->input('password');
         $loja->save();
         return redirect('loja/listar');
       }
    
       function editar($id) {
         $loja = Loja::find($id);
         $enderecos = Endereco::orderBy('rua')->get();
         return view('frmLoja', compact('loja', 'enderecos'));
       }
    
       function excluir($id) {
         $loja = Loja::find($id);
         $nome = $loja->nome;
         /*if ($noticia->imagem != "") {
           Storage::delete("public/imagens/".$noticia->imagem);
         }*/
    
         $loja->delete();
    
         return redirect('loja/listar')
            ->with(['msg' => "Loja $nome foi excluída"]);
       }
    
   
}
