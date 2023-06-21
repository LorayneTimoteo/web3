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



  <h1>Listagem de Endereco</h1>
  <a href="novo" class="btn btn-primary">Novo</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Rua</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th>pais</th>
        <th>cep</th>
      </tr>
    </thead>
    <tbody>
      @foreach($enderecos as $endereco)
          <tr>
            <td>{{$endereco->id}}</td>
            <td>{{$endereco->rua}}</td>
            <td>{{$endereco->Bairro}}</td>
            <td>{{$endereco->cidade}}</td>
            <td>{{$endereco->pais}}</td>
            <td>{{$endereco->cep}}</td>

            <td><a class='btn btn-primary' href='editar/{{$endereco->id}}'>+</a></td>
            <td><a class='btn btn-danger' href='excluir/{{$endereco->id}}'>-</a></td>
          </tr>
      @endforeach

   </tbody>
  </table>
 
@endsection
