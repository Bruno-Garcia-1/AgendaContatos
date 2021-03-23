@extends('layout')
@section('content')
    <div class="row">
        <h1 class="display-6">Pesquisar Pessoa</h1>
    </div>
    <form id="formSearch" name="formSearch" class="col-sm-12 col-md-9 p-3" action="{{ route('person.getPerson') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="form-floating">
                <input name="name" id="inputSearch" action="{{ route('person.getPerson') }}" type="text" class="form-control"  placeholder="Nome" autocomplete="off">
                <label for="floatingInput">Nome</label>
            </div>
        </div>
        <button type="submit" >Pesquisar</button>
    </form>

    <div class="container">
        <div class="row mb-3">
            <div id="gridPerson" data-bs-dismiss="modal">
                <!-- jquery -->
            </div>
        </div>
    </div>
@endsection
