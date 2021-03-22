
    $("#cpf").focusout(function () {

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

    $("#formPerson").submit(function (e) {
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

