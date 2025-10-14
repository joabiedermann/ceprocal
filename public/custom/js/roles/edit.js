$(document).ready(function () {
    $('.save-btn').on('click', function () {
        let $rol = $('#nombre').val();
        Swal.fire({
            customClass: {
                confirmButton: 'btn btn-outline-success',
                cancelButton: 'btn btn-outline-danger',
            },
            title: "¿Está seguro de actualizar el rol " + $rol + "?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Sí, actualizar!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                $('#store-form').submit();
            }
        });
    })

    $('.cancel-btn').on('click', function () {
        Swal.fire({
            customClass: {
                confirmButton: 'btn btn-outline-danger',
                cancelButton: 'btn btn-outline-light',
            },
            title: "¿Está seguro de cancelar la operación?",
            text: "Este cambio es irreversible!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, cancelar!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                let $url = $(this).data('url');
                window.location.href = $url;
            }
        });
    })

    setTimeout(() => {
        $('.alert').toggleClass('d-none');
    }, 5000);

    $('.padre').click(function () {
        let $id = $(this).data('id');
        if ($(this).is(':checked')) {
            $('.hijo-' + $id).prop('checked', true);
        } else {
            $('.hijo-' + $id).prop('checked', false);
        }

        contar_permisos();
    })

    $('.hijo').change(function () {
        let $padre = $(this).data('padre');
        let $hijos = $('.hijo-' + $padre).length;
        let $hijos_checked = $('.hijo-' + $padre).filter(':checked').length;
        if ($hijos > $hijos_checked) {
            $('#padre-' + $padre).prop('checked', false);
        } else {
            $('#padre-' + $padre).prop('checked', true);
        }

        contar_permisos();
    })

    $('#seleccionar-todo').click(function () {
        if ($(this).val() == '') {
            $('.padre').prop('checked', true);
            $('.hijo').prop('checked', true);

            $(this).html('Deseleccionar todo');
            $(this).val('ok');
            $(this).removeClass('btn-outline-primary');
            $(this).addClass('btn-outline-secondary');
        } else {
            $('.padre').prop('checked', false);
            $('.hijo').prop('checked', false);

            $(this).html('Seleccionar todo');
            $(this).val('');
            $(this).removeClass('btn-outline-secondary');
            $(this).addClass('btn-outline-primary');
        }

        contar_permisos();
    });

    marcar_padres();
})

function contar_permisos() {
    let $cantidad_total = $('.hijo').length;
    let $cantidad_permisos = $('.hijo').filter(':checked').length;
    $('#cantidad_permisos').val($cantidad_permisos);

    let $seleccionar_todo = $('#seleccionar-todo');
    if ($cantidad_total == $cantidad_permisos) {
        $seleccionar_todo.html('Deseleccionar todo');
        $seleccionar_todo.val('ok');
        $seleccionar_todo.removeClass('btn-outline-primary');
        $seleccionar_todo.addClass('btn-outline-secondary');
    } else {
        $seleccionar_todo.html('Seleccionar todo');
        $seleccionar_todo.val('');
        $seleccionar_todo.removeClass('btn-outline-secondary');
        $seleccionar_todo.addClass('btn-outline-primary');
    }
}

function marcar_padres() {
    $('.padre').each(function () {
        let $id = $(this).data('id');
        if ($('.hijo-' + $id).length > 0 && $('.hijo-' + $id).length == $('.hijo-' + $id).filter(':checked').length) {
            $(this).prop('checked', true);
        }
    })
}