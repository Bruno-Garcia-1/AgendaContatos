@extends('layout')
@section('content')
    <div class="row mb-3">
        <h1 class="display-6">Pesquisar Pessoa</h1>
    </div>
    <div class="container">
        <div class="row mb-3">
            <form id="formSearch" name="formSearch" class="col-12p-3" action="{{ route('person.getPerson') }}" method="POST">
                @csrf
                <div class="form-floating">
                    <input name="name" id="inputSearch" action="{{ route('person.getPerson') }}" type="text" class="form-control"  placeholder="Nome" autocomplete="off">
                    <label for="floatingInput">Nome</label>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row col-12 mb-3">
            <div id="gridPerson">


            </div>
        </div>
    </div>
            <!--

name: "Bruno Gracia"
cpf: "06580725958"

email: "brunogarcia.nti@gmail.com"
birthDate: "1986-08-05"

cellPhone: "42999868623"
homePhone: "4230303544"
commercialPhone: "4212121212"

zipCode: "85015400"
street: "Rua Bernardo José de Lacerda"
number: "15"
neighborhood: "Santa Cruz"
city: "Guarapuava"
state: "PR"





            -->

@endsection
