$(document).ready(function () {
    let i = 0;
    $("#insertAnswer").click(function () {

        i++;
        $('#dynamic_field').append('<br>' +
            '<div id="row' + i + '" class="row">' +
            '<input type="text" class="form-control name_list col-9 answer"/>&nbsp;&nbsp;' +
            '<input type="checkbox" value="2" class="status" id="myCheck"/> ' +
            '<input type="text" value="{{\\Illuminate\\Support\\Facades\\DB::table(\'questions\')->max(\'id\') + 1}}" class="questionsId" style="display: none"/>' +
            '<i name="remove" id="' + i + '" class="fa fa-trash btn_remove"  style="color: red" aria-hidden="true">' +
            '</i>' +
            '</div>');
    });
    $(document).on('click', '.btn_remove', function () {
        if (confirm('Are your sure???')) {
            let button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        }
    });

    $(document).on('click', '#myCheck', function () {
        $(this).val(1);
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

        console.log(type)

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

   // Add Answer
    $(document).on('click', '.create', function () {
        // e.preventDefault();
        let title = document.querySelectorAll('.answer');
        let status = document.querySelectorAll('.status');
        let questionId = document.querySelectorAll('.questionId');
        let listQuestionId = Array.prototype.slice.call(questionId);


        let listAnswers = [];

        for (let i = 0; i < title.length; i++) {
            listAnswers.push({
               'title': title[i].value,
               'status': status[i].value,
               'question_id': listQuestionId[0].value,
            });
        }
        console.log(listAnswers);
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        $.ajax({
            url: 'http://127.0.0.1:8000/answers/create',
            method: 'POST',
            dataType: 'json',
            data: { listAnswers: listAnswers
                // title_answer: ,
                // status: status,
                // question_id: questionId
            },
            success: function (result) {
                result.message;
            },
            error: function (error) {
                alert(error.message);
            }
        });
    });
});
