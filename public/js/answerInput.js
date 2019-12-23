$(document).ready(function () {
    let i = 1;
    $("#insertAnswer").click(function () {

        // i++;
        $('#dynamic_field').append('<br><div id="row' + i + ' title_answer[]" class="row"><input type="text" name="answer[]" id="title_answer[]" class="form-control name_list col-9 " />&nbsp;&nbsp;' +
            '<input type="checkbox" value="1" name="status[]" id="status_answer[]"/> ' +
            '<i name="remove" id="' + i + '" class="fa fa-trash btn_remove"  style="color: red" aria-hidden="true"></i></div>');
    });
    $(document).on('click', '.btn_remove', function () {
        if (confirm('Are your sure???')) {
            let button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        }
    });

//    Add Question
    $(document).on('click', '.add', function () {
        $('#display_answer').show();
        $('#display_form_answer').show();
        $('#submit').hide();
        let title = $('#title').val();
        let desc = $('#desc').val();
        let contentQ = $('#contentQuestion').val();
        let type = $('#type').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'http://127.0.0.1:8000/questions/create',
            type: 'POST',
            dataType: 'json',
            data: {
                title: title,
                desc: desc,
                contentQ: contentQ,
                type: type
            },
            success: function (result) {
            }
        });
    });

//    Add Answer
    $(document).on('click', '.create', function () {

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        $.ajax({
            url: 'http://127.0.0.1:8000/questions/create',
            type: 'POST',
            dataType: 'json',
            data: {value: $('#add_name').serialize()},
            success:function (result) {
                result.message;
            }
        });
    });
});
