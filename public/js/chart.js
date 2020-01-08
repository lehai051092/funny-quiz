$(document).ready(function () {
    $('.choseUser').on('change', function () {
        if ($(this).val() != -1) {
            $('#displayUser').show();
        }
    })
});
