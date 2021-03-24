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

$("#formAddress").submit(function (e)
{
    e.preventDefault();

    $.ajax({
        url: $(this).attr("action"),
        type: $(this).attr("method"),
        data: $(this).serialize(),
        dataType: 'json',
    }).done(function (response) {
        if (response){
            alertDiv('success','Endereço registrado com sucesso!',2000);
            $('#formAddress').each(function()
            {
                this.reset();
            });
        }else{
            alertDiv('success','ATENÇÃO: Ocorreu uma falha ao gravar os dados, contate o administrador do sistema.',5000);
        }


    });

});


