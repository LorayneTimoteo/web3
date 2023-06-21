
@extends('template')

@section('conteudo')
  <h1>Cadastro de Produto</h1>
  @if ($produto->imagem != "")
    <img style="width: 200px;height:200px;object-fit:cover" src="/storage/imagens/{{$produto->imagem}}">
  @endif


  <form action="{{url('produto/salvar')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3" hidden>
      <label for="id" class="form-label">ID</label>
      <input readonly class="form-control" readonly type="text" name="id" value="{{$produto->id}}">
    </div>

   
    <div class="mb-3">
      <label for="nome" class="form-label">Nome</label>
      <input class="form-control" type="nome" name="nome" value="{{$produto->nome}}">
    </div>


    <div class="mb-3">
      <label for="preco" class="form-label">Preco</label>
      <input class="form-control" type="preco" name="preco" value="{{$produto->preco}}">
    </div>


    <div class="mb-3">
      <label for="quantidade_estoque" class="form-label">quantidade</label>
      <input class="form-control" type="quantidade_estoque" name="quantidade_estoque" value="{{$produto->quantidade_estoque}}">
    </div>

    <div class="mb-3">
      <label for="sku" class="form-label">sku</label>
      <input class="form-control" type="sku" name="sku" value="{{$produto->sku}}">
    </div>

 


    <div class="mb-3">
      <label for="loja" class="form-label">lojas</label>
      <select class="form-select @error('loja_id') is-invalid @enderror" name="loja_id">
        @foreach($lojas as $loja)
          <option {{ $loja->id == old('loja_id', $produto->id_loja) ?'selected': ''}} value="{{$loja->id}} ">{{$loja->nome}}</option>
        @endforeach
      </select>
      @error('loja_id')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    </div>

    <div class="mb-3">
      <label for="arquivo" class="form-label">Figura</label>
      <input class="form-control" type="file" name="arquivo" accept="image/*">
    </div>


    <button class="btn btn-primary" type="submit" name="button">Salvar</button>
  </form>
@endsection
