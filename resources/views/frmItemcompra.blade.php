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

  <h1>Cadastro de Item compra</h1>
 


  <form action="{{url('itemCompra/salvar')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input readonly class="form-control" readonly type="text" name="id" value="{{$itemCompra>id}}">
    </div>



    <div class="mb-3">
      <label for="quantidade" class="form-label">Quantidade</label>
      <input class="form-control @error('quantidade') is-invalid @enderror" type="text" name="valor" value="{{old('valor', $itemCompra->quantidade)}}">
      @error('quantidade')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    </div>



    <div class="mb-3">
      <label for="preco_unitario" class="form-label">Preco unitario</label>
      <input class="form-control" type="preco_unitario" name="preco_unitario" value="{{$itemCompra->preco_unitario}}">
    </div>


    <div class="mb-3">
      <label for="produto" class="form-label">Produto</label>
      <select class="form-select @error('id_produto') is-invalid @enderror" name="id_produto">
        @foreach($produtos as $produto)
          <option {{ $produto->id == old('id_produto', $produto->id_produto) ?'selected': ''}} value="{{$produto->id}} ">{{$produto->nome}}</option>
        @endforeach
      </select>



      @error('id_produto')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

</div>


<div class="mb-3">
      <label for="compra" class="form-label">Compra</label>
      <select class="form-select @error('id_compra') is-invalid @enderror" name="id_vendedor">
        @foreach($compras as $compra)
          <option {{ $compra->id == old('id_compra', $produto->id_compra) ?'selected': ''}} value="{{$vendedor->id}} ">{{$vendedor->nome}}</option>
        @endforeach
      </select>



      @error('id_compra')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror




    <button class="btn btn-primary" type="submit" name="button">Salvar</button>
  </form>
@endsection
