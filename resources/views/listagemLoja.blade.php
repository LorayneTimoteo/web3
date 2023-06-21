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



  <h1>Listagem Loja</h1>
  <a href="novo" class="btn btn-primary">Novo</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>nome</th>
        <th>cnpj</th>
        <th>telefone</th>
        <th>email</th>
        <th>password</th>
        <th>endereco</th>

        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($lojas as $loja)
          <tr>
            <td>{{$loja->id}}</td>
            <td>{{$loja->nome}}</td>
            <td>{{$loja->cnpj}}</td>
            <td>{{$loja->telefone}}</td>
            <td>{{$loja->email}}</td>
            <td>{{$loja->password}}</td>
            <td>{{$loja->endereco->rua}}</td>
            
            
            <td><a class='btn btn-primary' href='editar/{{$loja->id}}'>+</a></td>
            <td><a class='btn btn-danger' href='excluir/{{$loja->id}}'>-</a></td>
          </tr>
      @endforeach

   </tbody>
  </table>

@endsection
