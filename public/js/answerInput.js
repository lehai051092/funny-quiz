$(document).ready(function () {
    let i = 1;
    $("#insertAnswer").click(function () {
        console.log('1');
        // i++;
        $('#dynamic_field').append('<br><div id="row' + i + '" class="row"><input type="text" name="name[]"  class="form-control name_list col-9 " />&nbsp;&nbsp;' +
            '<i name="" id="' + i + '" class="fa fa-check"  style="color: black" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;' +
            '<i name="remove" id="' + i + '" class="fa fa-trash btn_remove"  style="color: red" aria-hidden="true"></i></div>');
    });
    $(document).on('click', '.btn_remove', function () {
        if (confirm('Are your sure???')) {
            let button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        }

    });
});
