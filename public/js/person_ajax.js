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
        if (!response){
            $("#cpfHelp").removeClass('alert-success');
            $("#cpfHelp").addClass('alert-danger');
            $("#cpfHelp").text("CPF inválido!");
            $("#cpf").focus();
        } else  {
            $("#cpfHelp").removeClass('alert-danger');
            $("#cpfHelp").addClass('alert-success');
            $("#cpfHelp").text("CPF válido!");
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
        if (response){
            console.log(response);
            alert('Dados Salvos com sucesso!')
        }else{
            console.log(response);
            alert('Falha ao gravar dados!')
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
        console.log(response);
        if (!response){
            $("#resModal").text('Nenhum resultado foi encontrato!');
            $(this).focus();
        } else  {
            personList = response;

            response.forEach((p) => {
                console.log('ForEach response: ' + p.name);

                $("#gridPerson").text
                (
                    p.name + p.cpf
                );
            })
        }
    });
});

$("table tbody").on("click", "td", function (e)
{
    console.log(this.getAttribute('personid'));
    console.log(this.val());
});

