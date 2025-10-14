$(document).ready(function() {
    $('.save-btn').on('click', function () {
        Swal.fire({
            customClass: {
                confirmButton: 'btn btn-outline-success',
                cancelButton: 'btn btn-outline-danger',
            },
            title: "¿Está seguro de importar los datos en pantalla?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Sí, confirmar!",
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

    new Cleave('#horas', {
        numeral: true,
        numeralIntegerScale: 3,
        numeralDecimalScale: 0,
        numeralDecimalMark: '',
        delimiter: '',
    });

    $('.documento').on('input', function () {
        let $value = $(this).val();
        let $regex = /^([A-Fa-f]\d*|\d+)$/;

        if (!$regex.test($value)) {
            $(this).val($value.slice(0, -1));
        }
    });

    for (let $i = 0; $i < $('.fila-student').length; $i++) {
        new Cleave('#telefono-' + $i, {
            numeral: true,
            numeralDecimalScale: 0,
            numeralDecimalMark: '',
            delimiter: '',
        });
    }

    $('.modulo').on('input', function () {
        let $value = $(this).val().toUpperCase(); 
        
        $value = $value.replace(/[^IVXLCDM]/g, ''); 
        if($value.length > 3) {
            $value = $value.substring(0, 3);
        }
        $(this).val($value);
    })
})