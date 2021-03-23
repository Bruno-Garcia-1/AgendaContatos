$(document).ready(function(){
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.cep').mask('00000-000', {reverse: true});
    $('.cellPhone').mask('(00)0 0000-0000', {reverse: false});
    $('.phone').mask('(00)0000-0000', {reverse: false});
});
