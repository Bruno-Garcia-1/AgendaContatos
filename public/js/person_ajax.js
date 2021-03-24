let personList = '';

$("#cpf").focusout(function ()
{
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

        switch (response)
        {
            case 'invalid':
                $("#cpfHelp").removeClass('alert-success');
                $("#cpfHelp").removeClass('alert-warning');
                $("#cpfHelp").addClass('alert-danger');
                $("#cpfHelp").text("CPF inválido!");
                $("#cpf").focus();
                break;
            case 'duplicated':
                $("#cpfHelp").removeClass('alert-success');
                $("#cpfHelp").removeClass('alert-danger');
                $("#cpfHelp").addClass('alert-warning');
                $("#cpfHelp").text("CPF já cadastrado!");
                $("#cpf").focus();
                break;
            case 'valid':
                $("#cpfHelp").removeClass('alert-danger');
                $("#cpfHelp").removeClass('alert-warning');
                $("#cpfHelp").addClass('alert-success');
                $("#cpfHelp").text("CPF válido!");
                break;
            default:
                return
        }

    });
});
$("#formPerson").submit(function (e)
{
    e.preventDefault();

    $.ajax({
        url: $(this).attr("action"),
        type: $(this).attr("method"),
        data: $(this).serialize(),
        dataType: 'json',
    }).done(function (response) {
        if (response === true){
            alertDiv('success','Pessoa registrada com sucesso!',2000);
        } else if (response === 'duplicated'){
            alertDiv('danger','ATENÇÃO: O CPF já está cadastrado.',5000);
        }else{
            alertDiv('danger','ATENÇÃO: Ocorreu erro ao salvar os dados, contate o administrador do sistema.',5000);
        }
    });
});
$("#modalName").on('input',function ()
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
        if (response == null){
            $("#gridPerson").text('Nenhum resultado foi encontrato!');
            $(this).focus();
        } else  {
            personList = response;
            $("#gridPerson").text('')
            response.forEach((p) => {
                $("#gridPerson").append
                (
                    '<div class="card col-sm-12 mb-1">\n' +
                    '   <div class="row card-header text-center" onclick="setForm('+ p.personID +')">\n' +
                    '        <h5>'+ p.name +'</h5>\n' +
                    '   </div>' +
                    '</div>'
                );
            })
        }
    });
});

function setForm(personID)
{
    clearElement('form');
    clearElement('alert');
    clearElement('update');

    console.log(personList);

    personList.forEach(function (p){
        if (p.personID === personID)
        {
            $("#personName").val(p.name);
            $("#personId").val(p.personID);

            let screen = $("#screen").val();

            if (screen === 'address' && p.addressID)
            {
                alertDiv('primary','ATENÇÃO: Esta pessoa já possui um edereço cadastrado, ao prosseguir o registro será atualizado.');
                $("#update").val(true);
                $("#personId").val(p.personID);
                $("#addressId").val(p.addressID);
                $("#zipCode").val(p.zipCode);
                $("#street").val(p.street);
                $("#number").val(p.number);
                $("#neighborhood").val(p.neighborhood);
                $("#city").val(p.city);
                $("#state").val(p.state);
            }
            if (screen === 'phone' && p.phoneID)
            {
                alertDiv('primary','ATENÇÃO: Esta pessoa já possui um telefone, ao prosseguir o registro será atualizado.');
                $("#update").val(true);
                $("#personId").val(p.personID);
                $("#phoneId").val(p.phoneID);
                $("#cellPhone").val(p.cellPhone);
                $("#homePhone").val(p.homePhone);
                $("#commercialPhone").val(p.commercialPhone);
            }


        }
    });
}
function clearElement(element)
{
    switch (element)
    {
        case 'form':
            $('form').each(function()
            {
                this.reset();
            });
            break;
        case 'alert':
            $("#alert").text('');
            break;
        case 'update':
            $("#update").val('');
            break;
        default:
            return;
    }
}
function alertDiv(type, msg, time)
{
    $("#alert").append('<div class="alert alert-' + type + '" role="alert">' + msg + '</div>');

    if (time)
    {
        setTimeout(function(){
            $("#alert").fadeOut();
        }, time);
    }
}

