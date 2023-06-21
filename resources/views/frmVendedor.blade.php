
@extends('template')

@section('conteudo')
  <h1>Cadastro de Vendedor</h1>
  @if ($vendedor->imagem != "")
    <img style="width: 200px;height:200px;object-fit:cover" src="/storage/imagens/{{$vendedor->imagem}}">
  @endif

  <form action="{{url('vendedor/salvar')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3" hidden>
      <label for="id" class="form-label">ID</label>
      <input readonly class="form-control" readonly type="text" name="id" value="{{$vendedor->id}}">
    </div>

   
    <div class="mb-3">
      <label for="nome" class="form-label">Nome</label>
      <input class="form-control" type="text" name="nome" value="{{$vendedor->nome}}">
    </div>


    <div class="mb-3">
      <label for="telefone" class="form-label">Telefone</label>
      <input class="form-control" type="text" name="telefone" value="{{$vendedor->telefone}}">
    </div>

 <div class="mb-3">
      <label for="cpf" class="form-label">Cpf</label>
      <input class="form-control" type="txt" name="cpf" value="{{$vendedor->cpf}}">
    </div>


    <div class="mb-3">
      <label for="email" class="form-label">email</label>
      <input class="form-control" type="text" name="email" value="{{$vendedor->email}}">
   
    </div>
   

    <div class="mb-3">
      <label for="loja" class="form-label">lojas</label>
      <select class="form-select @error('loja_id') is-invalid @enderror" name="loja_id">
        @foreach($lojas as $loja)
          <option {{ $loja->id == old('loja_id', $vendedor->id_loja) ?'selected': ''}} value="{{$loja->id}} ">{{$loja->nome}}</option>
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
