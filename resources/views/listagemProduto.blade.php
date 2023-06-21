@extends('template')

@section('conteudo')
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif



  <h1>Listagem de Produto</h1>
  <a href="novo" class="btn btn-primary">Novo</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>imagem</th>
        <th>nome</th>
        <th>preco</th>
        <th>quantidade estoque</th>
        <th>sku</th>
        <th>loja</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($produtos as $produto)
          <tr>
            <td>{{$produto->id}}</td>
            <td>
              @if ($produto->imagem != "")
                <img style="width: 50px;" src="/storage/imagens/{{$produto->imagem}}">
              @endif            </td>
            <td>{{$produto->nome}}</td>
            <td>{{$produto->preco}}</td>
            <td>{{$produto->quantidade_estoque}}</td>
            <td>{{$produto->sku}}</td>
            <td>{{$produto->loja->nome}}</td>
            <td><a class='btn btn-primary' href='editar/{{$produto->id}}'>+</a></td>
            <td><a class='btn btn-danger' href='excluir/{{$produto->id}}'>-</a></td>
          </tr>
      @endforeach

   </tbody>
  </table>

@endsection
