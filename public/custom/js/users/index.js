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

    $('.form-select').select2({
        language: "es",
    });

    $('.show-btn').on('click', function () {
        const url = $(this).data('url');
        if (!url) return;

        $.ajax({
            url: url,
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            dataType: 'json',
            success: function (data) {
                $('#nombre-show').val(data.user.name);
                $('#rol-show').val(data.user.role.name);
                $('#email-show').val(data.user.email);
                $('#estado-show').val(data.user.status_text);
            },
            error: function (xhr, status, error) {
                console.error('Error al obtener datos:', error);
                Toastify({
                    text: "Error al obtener datos",
                    duration: 2000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #800000, #ff0000)", // granate a rojo
                        color: "#fff"
                    }
                }).showToast();
            }
        });
    });

    $('.create-btn').on('click', function () {
        const url = $(this).data('url');
        if (!url) return;

        $.ajax({
            url: url,
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            dataType: 'json',
            success: function (data) {
                let $role = $('#rol');
                $role.empty();
                $role.append(new Option('Seleccionar...', '', true, true)).find('option:first').prop('disabled', true);
                data.roles.forEach(function(role) {
                    $role.append(new Option(role.name, role.id));
                });
            },
            error: function (xhr, status, error) {
                console.error('Error al obtener datos:', error);
                Toastify({
                    text: "Error al obtener datos",
                    duration: 2000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #800000, #ff0000)", // granate a rojo
                        color: "#fff"
                    }
                }).showToast();
            }
        });
    });

    $('.edit-btn').on('click', function () {
        const url = $(this).data('url');
        if (!url) return;

        $.ajax({
            url: url,
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            dataType: 'json',
            success: function (data) {
                $('#nombre-edit').val(data.user.name);

                let $role_edit = $('#rol-edit');
                $role_edit.empty();
                $role_edit.append(new Option('Seleccionar...', '', true, true)).find('option:first').prop('disabled', true);
                data.roles.forEach(function(role) {
                    $role_edit.append(new Option(role.name, role.id, role.id === data.user.role.id, role.id === data.user.role.id));
                });
                $role_edit.trigger('change');

                $('#email-edit').val(data.user.email);

                let $status_edit = $('#estado-edit');
                $status_edit.val(data.user.status).trigger('change');

                $('#update-btn').data('url', "users/update/ " + data.user.id);
            },
            error: function (xhr, status, error) {
                console.error('Error al obtener datos:', error);
                Toastify({
                    text: "Error al obtener datos",
                    duration: 2000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #800000, #ff0000)", // granate a rojo
                        color: "#fff"
                    }
                }).showToast();
            }
        });
    });

    $('.status-btn').on('click', function () {
        const url = $(this).data('url');
        if (!url) return;

        $.ajax({
            url: url,
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            dataType: 'json',
            success: function (data) {
                Swal.fire({
                    customClass: {
                        confirmButton: 'btn btn-outline-warning',
                        cancelButton: 'btn btn-outline-danger',
                    },
                    title: data.message,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sí, actualizar!",
                    cancelButtonText: "Cancelar",
                }).then((result) => {
                    if (result.isConfirmed) {
                        let $url = "users/update_status/" + data.user.id;
                        update_status($url);
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error('Error al obtener datos:', error);
                Toastify({
                    text: "Error al obtener datos",
                    duration: 2000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #800000, #ff0000)", // granate a rojo
                        color: "#fff"
                    }
                }).showToast();
            }
        });
    });

    $('.destroy-btn').on('click', function () {
        const url = $(this).data('url');
        if (!url) return;

        $.ajax({
            url: url,
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            dataType: 'json',
            success: function (data) {
                Swal.fire({
                    customClass: {
                        confirmButton: 'btn btn-outline-danger',
                        cancelButton: 'btn btn-outline-light',
                    },
                    title: data.message,
                    text: "Este cambio es irreversible!",
                    icon: "error",
                    showCancelButton: true,
                    confirmButtonText: "Sí, eliminar!",
                    cancelButtonText: "Cancelar",
                }).then((result) => {
                    if (result.isConfirmed) {
                        let $url = "users/destroy/" + data.user.id;
                        destroy($url);
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error('Error al obtener datos:', error);
                Toastify({
                    text: "Error al obtener datos",
                    duration: 2000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #800000, #ff0000)", // granate a rojo
                        color: "#fff"
                    }
                }).showToast();
            }
        });
    });

    $('#save-btn').on('click', function () {
        Swal.fire({
            customClass: {
                confirmButton: 'btn btn-outline-success',
                cancelButton: 'btn btn-outline-danger',
            },
            title: "¿Está seguro de crear el nuevo registro?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, crear!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                let $url = $(this).data('url');
                save($url);
            }
        });
    })

    $('#update-btn').on('click', function () {
        Swal.fire({
            customClass: {
                confirmButton: 'btn btn-outline-success',
                cancelButton: 'btn btn-outline-danger',
            },
            title: "¿Está seguro de actualizar el registro?",
            text: "Este cambio es irreversible!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, actualizar!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                let $url = $(this).data('url');
                update($url);
            }
        });
    })
});

function save($url) {
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

function update($url) {
    let $formData = new FormData(document.getElementById('update-form'));
    $('#update-form').find('.is-invalid').removeClass('is-invalid');
    $('#update-form').find('.invalid-feedback').remove();
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

function update_status($url) {
    $.ajax({
        url: $url,
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
    });
};

function destroy($url) {
    $.ajax({
        url: $url,
        type: 'DELETE',
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
    });
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
