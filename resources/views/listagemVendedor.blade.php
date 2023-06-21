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



  <h1>Listagem Vendedor</h1>
  <a href="novo" class="btn btn-primary">Novo</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Imagem</th>
         <th>nome</th>
        <th>Telefone</th>
        <th>email</th>
        <th>cpf</th>
        <th>Loja</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($vendedores as $vendedor)
          <tr>
            <td>{{$vendedor->id}}</td>
            <td>
              @if ($vendedor->imagem != "")
                <img style="width: 50px;" src="/storage/imagens/{{$vendedor->imagem}}">
              @endif            </td>
            <td>{{$vendedor->nome}}</td>
            <td>{{$vendedor->telefone}}</td>
            <td>{{$vendedor->email}}</td>
            <td>{{$vendedor->cpf}}</td>
            <td>{{$vendedor->loja->nome}}</td>
            
            
            <td><a class='btn btn-primary' href='editar/{{$vendedor->id}}'>+</a></td>
            <td><a class='btn btn-danger' href='excluir/{{$vendedor->id}}'>-</a></td>
          </tr>
      @endforeach

   </tbody>
  </table>

@endsection
