$(document).ready(function() {
    $("#table").DataTable({
      paging: true,
      ordering: true,
      info: true,
      language: {
        url: './assets/js/datatable/datatables/spanish.json',
      }
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
                $('#nombre-show').val(data.permiso.name);
                $('#roles-show').val(data.permiso.roles_names);
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