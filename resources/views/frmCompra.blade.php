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

  <h1>Cadastro de Compras</h1>
 


  <form action="{{url('compra/salvar')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input readonly class="form-control" readonly type="text" name="id" value="{{$compra->id}}">
    </div>

    <div class="mb-3">
      <label for="data" class="form-label">Data</label>
      <input class="form-control @error('data') is-invalid @enderror" type="text" name="data" value="{{old('data', $compra->data)}}">
      @error('data')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>


    <div class="mb-3">
      <label for="valor" class="form-label">Valor</label>
      <input class="form-control @error('valor') is-invalid @enderror" type="text" name="valor" value="{{old('valor', $compra->valor)}}">
      @error('valor')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    </div>




    <div class="mb-3">
      <label for="cliente" class="form-label">Cliente</label>
      <select class="form-select @error('id_cliente') is-invalid @enderror" name="id_cliente">
        @foreach($clientes as $cliente)
          <option {{ $cliente->id == old('id_cliente', $cliente->id_cliente) ?'selected': ''}} value="{{$cliente->id}} ">{{$cliente->nome}}</option>
        @endforeach
      </select>



      @error('id_cliente')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

</div>


<div class="mb-3">
      <label for="vendedor" class="form-label">Vendedor</label>
      <select class="form-select @error('id_vendedor') is-invalid @enderror" name="id_vendedor">
        @foreach($vendedores as $vendedor)
          <option {{ $vendedor->id == old('id_vendedor', $compra->id_vendedor) ?'selected': ''}} value="{{$vendedor->id}} ">{{$vendedor->nome}}</option>
        @endforeach
      </select>



      @error('id_vendedor')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror




    <div class="mb-3">
      <label for="id_loja" class="form-label">Loja</label>
      <select class="form-select @error('loja') is-invalid @enderror" name="id_loja">
        @foreach($lojas as $loja)
          <option {{ $loja->id == old('id_loja', $compra->id_loja) ?'selected': ''}} value="{{$loja->id}} ">{{$loja->nome}}</option>
        @endforeach
      </select>
      @error('id_loja')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    </div>


    <button class="btn btn-primary" type="submit" name="button">Salvar</button>
  </form>
@endsection
