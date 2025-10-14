$(document).ready(function() {
    $('.save-btn').on('click', function () {
        Swal.fire({
            customClass: {
                confirmButton: 'btn btn-outline-success',
                cancelButton: 'btn btn-outline-danger',
            },
            title: "¿Está seguro de crear el nuevo registro?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Sí, crear!",
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

     new Cleave('#telefono', {
        numeral: true,
        numeralDecimalScale: 0,
        numeralDecimalMark: '',
        delimiter: '',
    });

    $('#ruc').on('input', function() {
        let $value = $(this).val();
        $value = $value.replace(/[^0-9]/g, '');
        if ($value.length > 0 && $value.length > 1) {
            $value = $value.replace(/(\d+)(\d{1})$/, '$1-$2');
        }
        $(this).val($value);
    });

    $('#logo').on('change', function () {
        let $reader = new FileReader();
        $reader.onload = function (e) {
            $('#vista').prop('src', e.target.result);
        }

        if (this.files && this.files[0]) {
            $reader.readAsDataURL(this.files[0]);
        }
        
        $('.delete-logo-btn').prop('disabled', false);
    })

    $('.delete-logo-btn').on('click', function () {
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
                $no_image = $(this).data('url');
                $('#logo').val('');
                $('#vista').css('width', '190px');
                $('#vista').css('height', '190px');
                $('#vista').prop('src', $no_image);
                $(this).prop('disabled', true);
            }
        });
    });
})