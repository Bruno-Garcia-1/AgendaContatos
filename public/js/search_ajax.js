$("#inputSearch").on('input',function ()
{
    if($(this).val().length < 2) return;
    $.ajax({
        url: $(this).attr("action"),
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).done(function (response) {
        console.log(response);
        if (response == null){
            $("#gridPerson").text('Nenhum resultado foi encontrato!');
            $(this).focus();
        } else  {
            personList = response;
            $("#gridPerson").text('')
            response.forEach((p) => {

                $("#gridPerson").append
                (
                    '<div class="card col-sm-12 mb-3">\n' +
    '                    <div class="row card-header text-center" onclick="showCardBody('+ p.id +')">\n' +
    '                        <h5>'+ p.name +'</h5>\n' +
    '                <div class="text-center">&#9660;</div>' +
    '                    </div>\n' +
    '                    <div id="'+ p.id +'" class="card-body col-12">\n' +
    '                        <form name="formSearchUpdate" action="" method="POST" class="form">\n' +
    '                            <div class="container">\n' +
    '                                <div class="row mb-3">\n' +
    '                                    <div class="col-sm-12 col-md-5">\n' +
    '                                        <label for="name" class="form-label">Nome</label>\n' +
    '                                        <input name="name" type="text" class="form-control" value="'+ p.name +'">\n' +
    '                                    </div>\n' +
    '                                    <div class="col-sm-12 col-md-5">\n' +
    '                                        <label for="cpf" class="form-label">CPF</label>\n' +
    '                                        <input name="cpf" id="cpf" type="text" class="form-control cpf" value="'+ p.cpf +'">\n' +
    '                                        <div id="cpfHelp" class="col-4 form-text text-center rounded-pill"></div>\n' +
    '                                    </div>\n' +
    '                                </div>\n' +
    '                                <div class="row mb-3">\n' +
    '                                    <div class="col-sm-12 col-md-5">\n' +
    '                                        <label for="email" class="form-label">E-mail</label>\n' +
    '                                        <input name="email" type="text" class="form-control" value="'+ p.email +'">\n' +
    '                                    </div>\n' +
    '                                    <div class="col-sm-12 col-md-5">\n' +
    '                                        <label for="birthDate" class="form-label">Data Nascimento</label>\n' +
    '                                        <input name="birthDate" type="date" class="form-control" value="'+ p.birthDate +'">\n' +
    '                                    </div>\n' +
    '                                </div>\n' +
    '                                <div class="row mb-3">\n' +
    '                                    <div class="col-sm-12 col-md-3">\n' +
    '                                        <label for="cellPhone" class="form-label">Telefone Celular</label>\n' +
    '                                        <input name="cellPhone" type="text" class="form-control cellPhone" id="cellPhone" placeholder="(00)0 0000-0000" value="'+ p.cellPhone +'">\n' +
    '                                    </div>\n' +
    '                                    <div class="col-sm-12 col-md-3">\n' +
    '                                        <label for="homePhone" class="form-label">Telefone Residencial</label>\n' +
    '                                        <input name="homePhone" type="text" class="form-control phone" id="homePhone" placeholder="(00)0000-0000" value="'+ p.homePhone +'">\n' +
    '                                    </div>\n' +
    '                                    <div class="col-sm-12 col-md-3">\n' +
    '                                        <label for="commercialPhone" class="form-label">Telefone Comercial</label>\n' +
    '                                        <input name="commercialPhone" type="text" class="form-control phone" id="commercialPhone" placeholder="(00)0000-0000" value="'+ p.commercialPhone +'">\n' +
    '                                    </div>\n' +
    '                                </div>\n' +
    '                                <div class="row mb-3">\n' +
    '                                    <div class="col-md-2">\n' +
    '                                        <label for="zipCode" class="form-label">CEP</label>\n' +
    '                                        <input name="zipCode" type="text" class="form-control cep" id="zipCode" placeholder="00000-000" value="'+ p.zipCode +'">\n' +
    '                                    </div>\n' +
    '                                </div>\n' +
    '                                <div class="row mb-3">\n' +
    '                                    <div class="col-md-6 mb-3">\n' +
    '                                        <label for="street" class="form-label">Logradouro</label>\n' +
    '                                        <input name="street" type="text" class="form-control" id="street" placeholder="Frodo street" value="'+ p.street +'">\n' +
    '                                    </div>\n' +
    '                                    <div class="col-md-3">\n' +
    '                                        <label for="number" class="form-label">Número</label>\n' +
    '                                        <input name="number" type="text" class="form-control" id="number" placeholder="123" value="'+ p.number +'">\n' +
    '                                    </div>\n' +
    '                                </div>\n' +
    '                                <div class="row mb-3">\n' +
    '                                    <div class="col-md-3 mb-3">\n' +
    '                                        <label for="neighborhood" class="form-label">Bairro</label>\n' +
    '                                        <input name="neighborhood" type="text" class="form-control" id="neighborhood" placeholder="Hobbiton" value="'+ p.neighborhood +'">\n' +
    '                                    </div>\n' +
    '                                    <div class="col-md-3 mb-3">\n' +
    '                                        <label for="city" class="form-label">Cidade</label>\n' +
    '                                        <input name="city" type="text" class="form-control" id="city" placeholder="Matamata" value="'+ p.city +'">\n' +
    '                                    </div>\n' +
    '                                    <div class="col-md-3">\n' +
    '                                        <label for="state" class="form-label">Estado</label>\n' +
    '                                        <input name="state" type="text" class="form-control" id="state" placeholder="Waikato" value="'+p.state+'">\n' +
    '                                    </div>\n' +
    '                                </div>\n' +
    '                            </div>\n' +
    '                        </form>\n' +
    '                    </div>\n' +
    '                </div>'
                );
            });
            $("#gridPerson :input").prop("disabled", true);
            $(".card-body").slideUp(1);
        }
    });
});


function showCardBody(id)
{
    $("#"+id).slideToggle('slow');
}

