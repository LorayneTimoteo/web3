
@extends('template')

@section('conteudo')
  <h1>Cadastro de Endereco</h1>
  

  <form action="{{url('endereco/salvar')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input readonly class="form-control" readonly type="text" name="id" value="{{$endereco->id}}">
    </div>

   
    <div class="mb-3">
      <label for="rua" class="form-label">Rua</label>
      <input class="form-control" type="rua" name="rua" value="{{$endereco->rua}}">
    </div>


    <div class="mb-3">
      <label for="bairro" class="form-label">Bairro</label>
      <input class="form-control" type="bairro" name="bairro" value="{{$endereco->bairro}}">
    </div>



    <div class="mb-3">
      <label for="cidade" class="form-label">Cidade</label>
      <input class="form-control" type="cidade" name="cidade" value="{{$endereco->cidade}}">
    </div>

 <div class="mb-3">
      <label for="pais" class="form-label">Pais</label>
      <input class="form-control" type="pais" name="pais" value="{{$endereco->pais}}">
    </div>

    

    <div class="mb-3">
      <label for="cep" class="form-label">Cep</label>
      <input class="form-control" type="cep" name="cep" value="{{$endereco->cep}}">
    </div>



    <button class="btn btn-primary" type="submit" name="button">Salvar</button>
  </form>
@endsection
