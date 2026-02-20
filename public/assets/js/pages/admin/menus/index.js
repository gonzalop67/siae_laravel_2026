$(document).ready(function () {
    $('#nestable').nestable().on('change', function () {
        const data = {
            menu: JSON.stringify($('#nestable').nestable('serialize')),
            _token: $('input[name=_token]').val()
        };
        $.ajax({
            url: '/admin/menus/guardar-orden',
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function (respuesta) {
                // console.log(respuesta);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
    $('#nestable').nestable('expandAll');
});
