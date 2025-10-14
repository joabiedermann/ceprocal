$(document).ready(function () {
    marcar_padres();
})

function marcar_padres() {
    $('.padre').each(function () {
        let $id = $(this).data('id');
        if ($('.hijo-' + $id).length > 0 && $('.hijo-' + $id).length == $('.hijo-' + $id).filter(':checked').length) {
            $(this).prop('checked', true);
        }
    })
}