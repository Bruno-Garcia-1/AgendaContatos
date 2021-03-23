$("#formPhone").submit(function (e)
{
    e.preventDefault();
    console.log($("#cellPhone").val());
    console.log($("#homePhone").val());
    console.log($("#commercialPhone").val());
    if ($("#cellPhone").val() === '' || $("#homePhone").val() === '' || $("#commercialPhone").val() === '')
    {
        alertDiv('danger','Preencha os campos obrigatórios',3000);
        return;
    }

    $.ajax({
        url: $(this).attr("action"),
        type: $(this).attr("method"),
        data: $(this).serialize(),
        dataType: 'json',
    }).done(function (response) {
        if (response){
            console.log(response);
            alertDiv('success','Telefone registrado com sucesso!',2000);
            $('#formPhone').each(function()
            {
                this.reset();
            });
        }else{
            console.log(response);
            alertDiv('success','ATENÇÃO: Ocorreu uma falha ao gravar os dados, contate o administrador do sistema.',5000);
        }
    });
});
