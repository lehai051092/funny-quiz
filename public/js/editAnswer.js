$(document).ready(function () {
    let i = 0;
    $("#editAnswer").click(function () {

        i++;
        $('#dynamic_edit').append('<br>' +
            '<div id="row' + i + '" class="row">' +
            '<input type="text" class="form-control name_list col-9 answerEdit"/>&nbsp;&nbsp;' +
            '<input type="checkbox" value="2" class="statusEdit" id="myCheckEdit"/> ' +
            '<input type="text" value="{{$answer[\'question_id\']}}" class="questionIdEdit" style="display: none"/>' +
            '<i name="remove" id="' + i + '" class="fa fa-trash btn_remove_edit"  style="color: red" aria-hidden="true">' +
            '</i>' +
            '</div>');
    });
    $(document).on('click', '.btn_remove_edit', function () {
        if (confirm('Are your sure???')) {
            let button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        }
    });

    $(document).on('click', '#myCheckEdit', function () {
        $(this).val(1);
    });
});
