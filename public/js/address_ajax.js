$("#zipCode").focusout(function ()
{
    $.ajax({
        url: 'https://viacep.com.br/ws/' + $(this).val().replace('-','') + '/json/',
        type: 'GET',
        dataType: 'json'
    }).done(function (response) {
        if (response)
        {
            $('#street').val(response.logradouro);
            $('#neighborhood').val(response.bairro);
            $('#city').val(response.localidade);
            $('#state').val(response.uf);
            $('#number').focus();
        }
    });
});

$("#formAddress").submit(function (e) {
    e.preventDefault();

    $.ajax({
        url: $(this).attr("action"),
        type: $(this).attr("method"),
        data: $(this).serialize(),
        dataType: 'json',
    }).done(function (response) {
        if (response){
            console.log(response);
            alert('Dados Salvos com sucesso!')
        }else{
            console.log(response);
            alert('Falha ao gravar dados!')
        }


    });

});

//$('#nome').focus();

