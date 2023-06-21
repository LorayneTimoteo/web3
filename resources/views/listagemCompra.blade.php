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



  <h1>Listagem de Compra</h1>
  <a href="novo" class="btn btn-primary">Novo</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>data</th>
        <th>valor</th>
        <th>cliente</th>
        <th>vendedor</th>
        <th>loja</th>
    </tr>
    </thead>
    <tbody>
      @foreach($compras as $compra)
          <tr>
            <td>{{$compra->id}}</td>
            <td>{{$compra->data->format('d/m/Y')}}</td>
            <td>{{$compra->cliente->id}}</td>
            <td>{{$compra->vendedor->nome}}</td>
            <td>{{$compra->loja->nome}}</td>
            <td><a class='btn btn-primary' href='editar/{{$compra->id}}'>+</a></td>
            <td><a class='btn btn-danger' href='excluir/{{$compra->id}}'>-</a></td>
          </tr>
      @endforeach

   </tbody>
  </table>
  {{ $compras->links() }}
@endsection
