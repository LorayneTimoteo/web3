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



  <h1>Listagem de Item Compra</h1>
  <a href="novo" class="btn btn-primary">Novo</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>quantidade</th>
        <th>preco unitario</th>
        <th>id_produto</th>
        <th>id_compra</th>
    </tr>
    </thead>
    <tbody>
      @foreach($itemCompras as $itemCompra)
          <tr>
            <td>{{$itemCompra->id}}</td>
            <td>{{$itemCompra->quantidade}}</td>
            <td>{{$itemCompra->produto->id}}</td>
            <td>{{$itemCompra->compra->id}}</td>

            <td><a class='btn btn-primary' href='editar/{{$compra->id}}'>+</a></td>
            <td><a class='btn btn-danger' href='excluir/{{$compra->id}}'>-</a></td>
          </tr>
      @endforeach

   </tbody>
  </table>
  {{ $itemCompra->links() }}
@endsection
