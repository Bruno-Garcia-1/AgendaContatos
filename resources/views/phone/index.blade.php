@extends('layout')
@section('content')
    <h1 class="display-6">Cadastrar Telefone</h1>

    <form id="formPhone" name="formPhone" class="col-9 p-3" action="{{ route('phone.save') }}" method="POST">
        @csrf

        <div class="row col-7">
            <div class="input-group mb-3">
                <input name="personName" id="personName" type="text" class="form-control" placeholder="Busque uma pessoa" aria-describedby="button-addon2" disabled>
                <input name="personId" id="personId" type="hidden" value="">
                <input name="update" id="update" type="hidden" value="">
                <button id="personModal"  class="btn btn-outline-secondary" type="button"  data-bs-toggle="modal" data-bs-target="#modalSearchPerson">Buscar Pessoa</button>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3">
                <label for="cellPhone" class="form-label">Telefone Celular</label>
                <input name="cellPhone" type="text" class="form-control cellPhone" id="cellPhone" placeholder="(00)0 0000-0000">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3">
                <label for="homePhone" class="form-label">Telefone Residencial</label>
                <input name="homePhone" type="text" class="form-control phone" id="homePhone" placeholder="(00)0000-0000">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3">
                <label for="commercialPhone" class="form-label">Telefone Comercial</label>
                <input name="commercialPhone" type="text" class="form-control phone" id="commercialPhone" placeholder="(00)0000-0000">
            </div>
        </div>

        <div class="row col-3 mt-3">
            <button type="submit" class="btn btn-primary">Gravar</button>
        </div>
    </form>

    @include('person.search.modal')
@endsection
