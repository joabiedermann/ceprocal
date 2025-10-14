$(document).ready(function () {
    $('.save-btn').on('click', function () {
        let $curso = $('#nombre').val();
        Swal.fire({
            customClass: {
                confirmButton: 'btn btn-outline-success',
                cancelButton: 'btn btn-outline-danger',
            },
            title: "¿Está seguro de actualizar el curso " + $curso + "?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Sí, actualizar!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                $url = $(this).data('url');
                $url_return = $('.cancel-btn').data('url');
                save($url, $url_return);
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

    new Cleave('#horas', {
        numeral: true,
        numeralIntegerScale: 3,
        numeralDecimalScale: 0,
        numeralDecimalMark: '',
        delimiter: '',
    });

    $('.form-select').select2({
        language: "es",
    });

    $(document).on('input', '.modulo', function () {
        let $value = $(this).val().toUpperCase(); 
        $value = $value.replace(/[^IVXLCDM]/g, ''); 
        if($value.length > 3) {
            $value = $value.substring(0, 3);
        }
        $(this).val($value);
    });

    $('#add-row-btn').on('click', function () {
        let $last_row = parseInt($('.fila:last').data('id'));
        let $new_row = $last_row + 1;

        if ($('.modulo-' + $last_row).val() && $('.descripcion-' + $last_row)) {
            let $add_row = `<div class="row g-2 align-items-center fila" id="fila-${$new_row}" data-id="${$new_row}">
                                <div class="col-md-1 mb-3 text-center">
                                    <input type="text" class="form-control form-control-sm text-center modulo modulo-${$new_row}" id="modulo-${$new_row}" name="detalles[${$new_row}][modulo]" value="" data-id="${$new_row}">
                                </div>
                                <div class="col-md-10 mb-3 text-center">
                                    <textarea class="form-control form-control-sm descripcion descripcion-${$new_row}" id="descripcion-${$new_row}" name="detalles[${$new_row}][descripcion]" cols="30" rows="3" data-id="${$new_row}"></textarea>
                                </div>
                                <div class="col-md-1 mb-3 text-center">
                                    <button type="button" class="btn btn-sm btn-outline-danger delete-row-btn" id="delete-btn-${$new_row}" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Eliminar línea" data-id="${$new_row}"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>`;

            $('#fila-nueva').append($add_row);
        } else {
            show_message('Debe completar los campos obligatorios para agregar una nueva línea.', 'error');
        }
    });

    $(document).on('click', '.delete-row-btn', function () {
        let $row = $(this).data('id');
        let $count_rows = $('.fila').length;

        if ($count_rows === 1) {
            show_message('No es posible eliminar todas las líneas.', 'error');
            return;
        }

        $('#fila-' + $row).detach();
    })
})

function save($url, $url_return) {
    let $formData = new FormData(document.getElementById('store-form'));
    $('#store-form').find('.is-invalid').removeClass('is-invalid');
    $('#store-form').find('.invalid-feedback').remove();
    $.ajax({
        url: $url,
        data: $formData,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        cache: false,
    }).then(function(response) {
        window.localStorage.setItem('message', response.message);
        window.localStorage.setItem('type', response.type);
        window.location.href = $url_return;
    }).fail(function(response) {
        if (response.status === 419) {
            Toastify({
                text: "Página expirada. Recargue la página.",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                    background: "linear-gradient(to right, #800000, #ff0000)",
                    color: "#fff"
                }
            }).showToast();
        }

        $.each(response.responseJSON.errors, function ($key, $value) {
            let $input = $(`[name="${$key}"]`);
            if ($key.includes('detalles')) {
                $input = $(`[id="${$key.split('.')[2]}-${$key.split('.')[1]}"]`);
            }
            $input.addClass('is-invalid');
            $('<span>').addClass('invalid-feedback').html($value.join('<strong>')).insertAfter($input);
        })
    })
};

function show_message($message, $type) {
    let $color;
    switch ($type) {
        case 'success':
            $color = "linear-gradient(to right, #006400, #228B22)";
            break;
        default:
            $color = "linear-gradient(to right, #800000, #ff0000)";
            break;
    }

    Toastify({
        text: $message,
        duration: 2000,
        close: true,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
            background: $color,
            color: "#fff"
        }
    }).showToast();
}