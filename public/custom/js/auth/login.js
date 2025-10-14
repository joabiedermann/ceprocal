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
});

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
