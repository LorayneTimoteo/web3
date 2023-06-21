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



  <h1>Listagem de Cliente</h1>
  <a href="novo" class="btn btn-primary">Novo</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>cpf</th>
        <th>loja_id</th>
      </tr>
    </thead>
    <tbody>
      @foreach($clientes as $cliente)
          <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->nome}}</td>
            <td>{{$cliente->email}}</td>
            <td>{{$cliente->telefone}}</td>
            <td>{{$cliente->cpf}}</td>
            <td>{{$cliente->loja->nome}}</td>

            <td><a class='btn btn-primary' href='editar/{{$cliente->id}}'>+</a></td>
            <td><a class='btn btn-danger' href='excluir/{{$cliente->id}}'>-</a></td>
          </tr>
      @endforeach

   </tbody>
  </table>
 
@endsection
