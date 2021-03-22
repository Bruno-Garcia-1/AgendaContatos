@extends('layout')
@section('content')
    <h1 class="display-6">Cadastrar Endereço</h1>

    <form id="formAddress" class="col-9 p-3" action="{{ route('address.save') }}" method="POST">
        @csrf

        <div class="row col-7">
            <div class="input-group mb-3">
                <input name="personName" id="personName" type="text" class="form-control" placeholder="Busque uma pessoa" aria-describedby="button-addon2" disabled>
                <input name="personId" id="personId" type="hidden" value="">
                <button id="personModal"  class="btn btn-outline-secondary" type="button"  data-bs-toggle="modal" data-bs-target="#modalSearchPerson">Buscar Pessoa</button>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-2">
                <label for="zipCode" class="form-label">CEP</label>
                <input name="zipCode" type="text" class="form-control cep" id="zipCode" placeholder="00000-000">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <label for="street" class="form-label">Logradouro</label>
                <input name="street" type="text" class="form-control" id="street" placeholder="Frodo street" value="">
            </div>
            <div class="col-3">
                <label for="number" class="form-label">Número</label>
                <input name="number" type="text" class="form-control" id="number" placeholder="123">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3">
                <label for="neighborhood" class="form-label">Bairro</label>
                <input name="neighborhood" type="text" class="form-control" id="neighborhood" placeholder="Hobbiton">
            </div>
            <div class="col-3">
                <label for="city" class="form-label">Cidade</label>
                <input name="city" type="text" class="form-control" id="city" placeholder="Matamata">
            </div>
            <div class="col-3">
                <label for="state" class="form-label">Estado</label>
                <input name="state" type="text" class="form-control" id="state" placeholder="Waikato">
            </div>
        </div>
        <div class="row col-3 mt-3">
            <button type="submit" class="btn btn-primary">Gravar</button>
        </div>
    </form>

    @include('person.search.modal')
@endsection
