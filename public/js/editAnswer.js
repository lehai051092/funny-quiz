$(document).ready(function () {
    let i = 0;
    $("#editAnswer").click(function () {
        $('.save').show();
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
        if (confirm('Are you Remove???')) {
            let button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        }
    });

    $(document).on('click', '#myCheckEdit', function () {
        $(this).val(1);
    });

    $('.statusOld').on('change', function () {
        if ($(this).prop("checked")) {
            this.value = 1
        } else {
            this.value = 2
        }
    });

    //    Edit Question
    $(document).on('click', '.editQuestion', function () {
        $('#editQuestion').hide();
        $('#editAnswers').show();
        $('.cancel1').hide();
        let titleEdit = $('#titleEdit').val();
        let descEdit = CKEDITOR.instances['editor1'].getData();
        let contentQuestionEdit = $('#contentQuestionEdit').val();
        let category_id = $('#category_id').val();
        let type_id = $('#type_id').val();
        let id = $('#id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: 'http://127.0.0.1:8000/questions/' + id + '/edit',
            type: 'POST',
            dataType: 'json',
            data: {
                titleEdit: titleEdit,
                descEdit: descEdit,
                contentQuestionEdit: contentQuestionEdit,
                category_id: category_id,
                type_id: type_id,
                id: id
            },
            success: function (result) {
            },
            error: function (e) {
                alert(e.message)
            }
        });
    });

    // update Answers
    $(document).on('click', '.editAnswers', function () {
        $('.done').show();
        $(this).hide();
        let idOld = document.querySelectorAll('.idOld');
        let titleOld = document.querySelectorAll('.titleOld');
        let statusOld = document.querySelectorAll('.statusOld');
        let questionIdOld = document.querySelectorAll('.questionIdOld');
        let listQuestionIdOld = Array.prototype.slice.call(questionIdOld);
        let id = $('#id').val();
        console.log(idOld[0].value);

        let listAnswersOld = [];

        for (let i = 0; i < titleOld.length; i++) {
            listAnswersOld.push({
                'id': idOld[i].value,
                'title': titleOld[i].value,
                'status': statusOld[i].value,
                'question_id': listQuestionIdOld[0].value,
            });
        }

        $.ajax({
            url: 'http://127.0.0.1:8000/questions/' + id + '/editAnswers',
            method: 'POST',
            dataType: 'json',
            data: {
                listAnswersOld: listAnswersOld
            },
            success: function (result) {
                result.message;
            },
            error: function (error) {
                alert(error.message);
            }
        });
    });

// Add Answer
    $(document).on('click', '.save', function () {
        let title = document.querySelectorAll('.answerEdit');
        let status = document.querySelectorAll('.statusEdit');
        let question_id = $('#id').val();

        let listAnswers = [];

        for (let i = 0; i < title.length; i++) {
            listAnswers.push({
                'title': title[i].value,
                'status': status[i].value,
                'question_id': question_id,
            });
        }

        $.ajax({
            url: 'http://127.0.0.1:8000/questions/'+ question_id +'/addAnswers',
            method: 'POST',
            dataType: 'json',
            data: {
                listAnswers: listAnswers
            },
            success: function (result) {
                result.message;
            },
            error: function (error) {
                alert('error');
            }
        });
    });
});
