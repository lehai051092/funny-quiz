$(document).ready(function () {
    let i = 0;

    $(document).on('click', '.btn_remove', function () {
        if (confirm('Are your sure???')) {
            let button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        }
    });

    $('.status').on('change', function () {
        if ($(this).prop("checked")) {
            this.value = 1
        } else {
            this.value = 2
        }
    });

    $(document).on('click', '#myCheck', function () {
        $(this).val(1);
    });

    $('#type').change(function () {
        let arr = [$(this).find(':selected').val()];
        if (arr[0] == 2) {
            $('#trueFalse').show()
                $('#insertAnswer').hide()
            $('#trueFalse').append(
                '<div class="row mt-3">' +
                ' <input type="text" class="form-control  col-9 answer" value=""/>&nbsp;&nbsp;' +
                '<input type="radio" id="myCheckRadio" name="status" class="status" value="2"/>' +
                ' <input type="text"\n' +
                '    value=""\n' +
                'class="questionId" style="display: none"/>' +
                ' <idesc name="remove" id="\' + i + \'" class="fa fa-trash btn_remove"\n' +
                '    style="color: red" aria-hidden="true"></idesc>' +
                ' </div>' +
                '<div class="row mt-3">' +
                ' <input type="text" class="form-control  col-9 answer" value=""/>&nbsp;&nbsp;' +
                '<input type="radio" id="myCheckRadio" name="status" class="status" value="2"/>' +
                '<input type="text"\n' +
                '    value=""\n' +
                'class="questionId" style="display: none"/>' +
                '<i name="remove" id="\' + i + \'" class="fa fa-trash btn_remove"\n' +
                '    style="color: red" aria-hidden="true"></i>' +
                ' </div>'
            );
        } else if (arr[0] == 1) {
            $('#trueFalse').hide()
            $('#insertAnswer').show()
            $("#insertAnswer").click(function () {

                i++;
                $('#dynamic_field').append('<br>' +
                    '<div id="row' + i + '" class="row">' +
                    '<input type="text" class="form-control name_list col-9 answer"/>&nbsp;&nbsp;' +
                    '<input type="checkbox" value="2" class="status" id="myCheck"/> ' +
                    '<i name="remove" id="' + i + '" class="fa fa-trash btn_remove"  style="color: red" aria-hidden="true">' +
                    '</i>' +
                    '</div>');
            });
        }
    });

//    Add Question
    $(document).on('click', '.add', function () {

        $('#display_answer').show();
        $('#display_form_answer').show();
        $('#submit').hide();
        let title = $('#title').val();
        let desc = CKEDITOR.instances['editor1'].getData();
        let contentQ = $('#contentQuestion').val();
        let category = $('#category').val();
        let type = $('#type').val();

        console.log('d' + desc, 'c' + contentQ);
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
                category: category,
                type: type
            },
            success: function (result) {
                $('.questionsId').val(result.id);
            }
        });
    });

    // Add Answer
    $(document).on('click', '.create', function () {
        $('.done').show();
        $(this).hide();
        let title = document.querySelectorAll('.answer');
        let status = document.querySelectorAll('.status');
        let questionId = document.getElementById('questionsId');

        console.log(questionId.value);
        let listAnswers = [];

        for (let i = 0; i < title.length; i++) {
            listAnswers.push({
                'title': title[i].value,
                'status': status[i].value,
                'question_id': questionId.value,
            });
        }

        $.ajax({
            url: 'http://127.0.0.1:8000/answers/create',
            method: 'POST',
            dataType: 'json',
            data: {
                listAnswers: listAnswers
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
