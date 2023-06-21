<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use App\Models\Loja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class VendedorController extends Controller
{
 
    function listar() {
        $vendedores = Vendedor::orderBy('nome')->get();
        return view('listagemVendedor',
                      compact('vendedores'));
      }

      
      function novo() {
        $vendedor = new Vendedor();
        $vendedor->id = 0;
        $vendedor->nome = "";
        $vendedor->telefone = "";
        $vendedor->email = "";
        $vendedor->cpf = "";
        $vendedor->imagem = "";
        $lojas = Loja::orderBy('nome')->get();
        return view('frmVendedor', compact('vendedor','lojas'));
      }

      function salvar(Request $request) {
        if ($request->input('id') == 0) {
          $vendedor = new Vendedor();
        } else {
          $vendedor = Vendedor::find($request->input('id'));
        }
        if ($request->hasFile('arquivo')) {
            $file = $request->file('arquivo');
            $upload = $file->store('public/imagens');
            $upload = explode("/", $upload);
            $tamanho = sizeof($upload);
            if ($vendedor->imagem != "") {
              Storage::delete("public/imagens/".$vendedor->imagem);
            }
            $vendedor->imagem = $upload[$tamanho-1];
        }
    
    
        $vendedor->nome = $request->input('nome');
        $vendedor->telefone = $request->input('telefone');
        $vendedor->email = $request->input('email');
        $vendedor->cpf = $request->input('cpf');
        $vendedor->loja_id = $request->input('loja_id');
       
    
        $vendedor->save();
        return redirect('vendedor/listar');
      }


      function editar($id) {
        $vendedor = Vendedor::find($id);
        $lojas = Loja::orderBy('nome')->get();
        return view('frmVendedor', compact('vendedor','lojas'));
      }



      function excluir($id) {
        $vendedor = Vendedor::find($id);
       if ($vendedor->imagem != "") {
          Storage::delete("public/imagens/".$vendedor->imagem);
        }
        $vendedor->delete();
        return redirect('vendedor/listar');
      }


}