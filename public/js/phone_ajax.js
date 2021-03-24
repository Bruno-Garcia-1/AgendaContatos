$("#cellPhone").focusout(function ()
{
    let url = $(this).attr("action");
    let data = $(this).serialize();
    let div = $(this).attr("name");

    phoneCheck(url, data, div);
});
$("#homePhone").focusout(function ()
{
    let url = $(this).attr("action");
    let data = $(this).serialize();
    let div = $(this).attr("name");

    phoneCheck(url, data, div);
});
$("#commercialPhone").focusout(function ()
{
    let url = $(this).attr("action");
    let data = $(this).serialize();
    let div = $(this).attr("name");

    phoneCheck(url, data, div);
});

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

function phoneCheck(url, data, div)
{
    return $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function (response) {
                if (response === 'duplicated'){
                    $("#"+div+'Help').removeClass('alert-success');
                    $("#"+div+'Help').addClass('alert-warning');
                    $("#"+div+'Help').text("Telefone já cadastrado!");
                    $("#"+div).focus();
                }else if(response === 'valid'){
                    $("#"+div+'Help').removeClass('alert-warning');
                    $("#"+div+'Help').addClass('alert-success');
                    $("#"+div+'Help').text("Este telefone é novo!.");
                }
            });
}
