$(document).ready(function () {
    $('#icono').blur(function () { 
        $('#mostrar-icono').removeClass().addClass('bi ' + $(this).val());
    });
});