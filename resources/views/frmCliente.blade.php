
@extends('template')

@section('conteudo')
  <h1>Cadastro de Cliente</h1>
  

  <form action="{{url('cliente/salvar')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3" hidden>
      <label for="id" class="form-label">ID</label>
      <input readonly class="form-control" readonly type="text" name="id" value="{{$cliente->id}}">
    </div>

   
    <div class="mb-3">
      <label for="nome" class="form-label">Nome</label>
      <input class="form-control" type="nome" name="nome" value="{{$cliente->nome}}">
    </div>


    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input class="form-control" type="email" name="email" value="{{$cliente->email}}">
    </div>



    <div class="mb-3">
      <label for="telefone" class="form-label">Telefone</label>
      <input class="form-control" type="telefone" name="telefone" value="{{$cliente->telefone}}">
    </div>

 <div class="mb-3">
      <label for="cpf" class="form-label">Cpf</label>
      <input class="form-control" type="cpf" name="cpf" value="{{$cliente->cpf}}">
    </div>


    <div class="mb-3">
      <label for="loja" class="form-label">lojas</label>
      <select class="form-select @error('loja_id') is-invalid @enderror" name="loja_id">
        @foreach($lojas as $loja)
          <option {{ $loja->id == old('loja_id', $cliente->id_loja) ?'selected': ''}} value="{{$loja->id}} ">{{$loja->nome}}</option>
        @endforeach
      </select>
      @error('loja_id')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    </div>

    


    <button class="btn btn-primary" type="submit" name="button">Salvar</button>
  </form>
@endsection
