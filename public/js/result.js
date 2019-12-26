$(document).ready(function () {
    $('.myCheckResult').on('change',function () {
        if ($(this).prop("checked")) {
            $('#send').show();
        }
    })
});
