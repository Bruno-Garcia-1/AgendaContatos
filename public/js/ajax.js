$("#formQuitacao").submit(function (e){
   e.preventDefault();

    let url         = $(this).attr("action");
    let method      = $(this).attr("method");
    let formData    = $(this).serialize();

    $.ajax({
        url  : url,
        type : method,
        data : formData
    }).done(function (response){
        console.log(response);

    });
});
