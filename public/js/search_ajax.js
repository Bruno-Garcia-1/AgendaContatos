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
                console.log('ForEach response: ' + p.name);

                $("#gridPerson").append
                (
                    "<p class='personRow' onclick='loadPersonRow(" + p.id + ")'>" +
                    p.name +
                    "</p>"
                );
            })
        }
    });
});
