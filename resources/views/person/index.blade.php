@extends('layout')
@section('content')
    <div class="row">
        <h1 class="display-6">Cadastrar Pessoa</h1>
    </div>
    <form id="formPerson" class="col-5 p-3" action="{{ route('person.save') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome completo</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp">
            <div id="nameHelp" class="col-4 form-text text-center rounded-pill"></div>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input name="cpf" type="text" action="{{ route('person.cpfCheck') }}" class="form-control cpf" id="cpf" aria-describedby="cpfHelp">
            <div id="cpfHelp" class="col-4 form-text text-center rounded-pill"></div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="col-4 form-text text-center rounded-pill"></div>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Data nascimento</label>
            <input name="birthDate" type="date" class="form-control" id="birthDate" aria-describedby="birthDateHelp">
            <div id="birthDateHelp" class="col-4 form-text text-center rounded-pill"></div>
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>
    </form>

@endsection
