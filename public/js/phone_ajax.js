$("#formPhone").submit(function (e)
{
    e.preventDefault();

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
