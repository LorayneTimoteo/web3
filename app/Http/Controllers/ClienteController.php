<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Storage;
use App\Models\Loja;


class ClienteController extends Controller
{
    function listar() {
        $clientes = Cliente::orderBy('nome')->get();
        return view('listagemCliente',
                      compact('clientes'));
      }

      //arrumar o controller, arrumar a view 
  
      function novo() {
        $cliente = new Cliente();
        $cliente->id = 0;
        $cliente->nome = "";
        $cliente->email = "";
        $cliente->telefone = "";
        $cliente->cpf = "";
        $lojas = Loja::orderBy('nome')->get();
        return view('frmCliente', compact('cliente','lojas'));
      }

      function salvar(Request $request) {
        if ($request->input('id') == 0) {
          $cliente = new Cliente();
        } else {
          $cliente = Cliente::find($request->input('id'));
        }
      /*  if ($request->hasFile('arquivo')) {
            $file = $request->file('arquivo');
            $upload = $file->store('public/imagens');
            $upload = explode("/", $upload);
            $tamanho = sizeof($upload);
            if ($autor->imagem != "") {
              Storage::delete("public/imagens/".$autor->imagem);
            }
            $autor->imagem = $upload[$tamanho-1];
        }*/
    
    
        $cliente->nome = $request->input('nome');
        $cliente->email = $request->input('email');
        $cliente->telefone = $request->input('telefone');
        $cliente->cpf = $request->input('cpf');
        $vendedor->loja_id = $request->input('loja_id');
       

        $cliente->save();
        return redirect('cliente/listar');
      }


      function editar($id) {
        $cliente = Cliente::find($id);
 
        return view('frmCliente', compact('cliente'));
      }



      function excluir($id) {
        $cliente = Cliente::find($id);
       /* if ($autor->imagem != "") {
          Storage::delete("public/imagens/".$autor->imagem);
        }*/
        $cliente->delete();
        return redirect('cliente/listar');
      }



}