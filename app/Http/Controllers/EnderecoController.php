<?php

namespace App\Http\Controllers;
use App\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
     //
     function listar() {
        $enderecos = Endereco::orderBy('rua')->get();
        return view('listagemEndereco',
                      compact('enderecos'));
      }
  
      function novo() {
        $endereco = new Endereco();
        $endereco->id = 0;
        $endereco->rua = "";
        $endereco->bairro = "";
        $endereco->cidade = "";
        $endereco->pais = "";
        $endereco->cep = "";
        return view('frmEndereco', compact('endereco'));
      }
  
      function salvar(Request $request) {
        if ($request->input('id') == 0) {
          $endereco = new Endereco();
        } else {
          $endereco = Endereco::find($request->input('id'));
        }
       
        $endereco = new Endereco();  
  
        $endereco->rua = $request->input('rua');
        $endereco->bairro = $request->input('bairro');
        $endereco->cidade = $request->input('cidade');
        $endereco->cep = $request->input('cep');
        $endereco->pais = $request->input('pais');
        
        $endereco->save();
        return redirect('endereco/listar');
      }
     
        function editar($id) {
            $endereco = Endereco::find($id);
            return view('frmEndereco', compact('endereco'));
          }
      
          function excluir($id) {
            $endereco = Endereco::find($id);
            $endereco->delete(); 
            return redirect('endereco/listar')->with(['msg'=> 'Endereco excluído']);
      
         
        }
    
    
    }
  
     
