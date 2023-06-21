
@extends('template')

@section('conteudo')
  <h1>Cadastro de Loja</h1>
  

  <form action="{{url('loja/salvar')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input readonly class="form-control" readonly type="text" name="id" value="{{$loja->id}}">
    </div>

   
    <div class="mb-3">
      <label for="nome" class="form-label">Nome</label>
      <input class="form-control" type="nome" name="nome" value="{{$loja->nome}}">
    </div>


    <div class="mb-3">
      <label for="cnpj" class="form-label">CNPJ</label>
      <input class="form-control" type="text" name="cnpj" value="{{$loja->cnpj}}">
    </div>



    <div class="mb-3">
      <label for="telefone" class="form-label">Telefone</label>
      <input class="form-control" type="telefone" name="telefone" value="{{$loja->telefone}}">
    </div>



 <div class="mb-3">
      <label for="password" class="form-label">Email</label>
      <input class="form-control" type="text" name="email" value="{{$loja->password}}">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Senha aqui</label>
      <input class="form-control" type="text" name="password" value="{{$loja->password}}">
    </div>


    <div class="mb-3">
      <label for="endereco" class="form-label">endereco</label>
      <select class="form-select @error('endereco_id') is-invalid @enderror" name="endereco_id">
        @foreach($enderecos as $endereco)
          <option {{ $endereco->id == old('endereco_id', $loja->endereco_id) ?'selected': ''}} value="{{$endereco->id}} ">{{$endereco->rua}}</option>
        @endforeach
      </select>
      @error('endereco_id')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    </div>

    


    <button class="btn btn-primary" type="submit" name="button">Salvar</button>
  </form>
@endsection
