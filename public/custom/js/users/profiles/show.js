$(document).ready(function () {
    if (window.localStorage.getItem('message') && window.localStorage.getItem('type')) {
        show_message(window.localStorage.getItem('message'), window.localStorage.getItem('type'));
        localStorage.clear();
    }

    if ($('#success').val()) {
        var $message = $('#success').val();
        var $type = 'success';
        show_message($message, $type);
    }

    if ($('#error').val()) {
        var $message = $('#error').val();
        var $type = 'error';
        show_message($message, $type);
    }

    $('#avatar').on('change', function () {
        let $reader = new FileReader();
        $reader.onload = function (e) {
            $('#vista').prop('src', e.target.result);
        }

        if (this.files && this.files[0]) {
            $reader.readAsDataURL(this.files[0]);
        }
        
        $('.delete-avatar-btn').prop('disabled', false);
    })

    $('.delete-avatar-btn').on('click', function () {
        Swal.fire({
            customClass: {
                confirmButton: 'btn btn-outline-danger',
                cancelButton: 'btn btn-outline-light',
            },
            title: "¿Está seguro de eliminar el archivo subido?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, eliminar!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                $avatar = $(this).data('url');
                $('#avatar').val('');
                $('#vista').prop('src', $avatar);
                $(this).prop('disabled', true);
            }
        });
    });

    $('.save-password-btn').on('click', function () {
        Swal.fire({
            customClass: {
                confirmButton: 'btn btn-outline-success',
                cancelButton: 'btn btn-outline-danger',
            },
            title: "¿Está seguro de actualizar tu contraseña?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, actualizar!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                let $url = $(this).data('url');
                save_password($url);
            }
        });
    })

    $('.save-info-btn').on('click', function () {
        Swal.fire({
            customClass: {
                confirmButton: 'btn btn-outline-success',
                cancelButton: 'btn btn-outline-danger',
            },
            title: "¿Está seguro de actualizar la información de tu perfil?",
            text: "Este cambio es irreversible!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, actualizar!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                let $url = $(this).data('url');
                save_info($url);
            }
        });
    })

    $('.inactivate-btn').on('click', function () {
        Swal.fire({
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-outline-light',
            },
            title: "¿Está seguro de desactivar su cuenta?",
            text: "Este cambio es irreversible!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, desactivar!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                let $url = $(this).data('url');
                inactivate($url);
            }
        });
    })
});

function save_password($url) {
    let $formData = new FormData(document.getElementById('store-password-form'));
    $('#store-password-form').find('.is-invalid').removeClass('is-invalid');
    $('#store-password-form').find('.invalid-feedback').remove();
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
        window.location.reload();
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

function save_info($url) {
    let $formData = new FormData(document.getElementById('store-info-form'));
    $('#store-info-form').find('.is-invalid').removeClass('is-invalid');
    $('#store-info-form').find('.invalid-feedback').remove();
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
        window.location.reload();
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

function inactivate($url) {
    let $formData = new FormData(document.getElementById('inactivate-form'));
    $('#inactivate-form').find('.is-invalid').removeClass('is-invalid');
    $('#inactivate-form').find('.invalid-feedback').remove();
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
        window.location.reload();
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
