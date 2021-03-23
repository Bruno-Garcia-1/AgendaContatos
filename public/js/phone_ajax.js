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
            alert('Dados Salvos com sucesso!')
            $('#formPhone').each(function()
            {
                this.reset();
            });
        }else{
            console.log(response);
            alert('Falha ao gravar dados!')
        }
    });
});
