$(document).ready(function() {
    $("#table").DataTable({
      paging: true,
      ordering: true,
      info: true,
      language: {
        url: './assets/js/datatable/datatables/spanish.json',
      }
    });

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

    if (window.localStorage.getItem('message') && window.localStorage.getItem('type')) {
        show_message(window.localStorage.getItem('message'), window.localStorage.getItem('type'));
        localStorage.clear();
    }

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
                        let $url = "roles/update_status/" + data.role.id;
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
                        let $url = "roles/destroy/" + data.role.id;
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
})

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