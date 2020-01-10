$(document).ready(function () {
    $("#search").on('keyup', function () {
        let value = $(this).val();
        let Id =$("#id-quiz").val();

        $.ajax({
            url: 'http://127.0.0.1:8000/quizzes/'+Id+'/add/search',
            type: 'GET',
            dataType: 'json',
            data: {keyword: value},

            success: function (result) {
    console.log(result)
                let html = '';
                for (let i = 0; i < result.length; i++) {
                   if (result[i].quiz_id === null){
                       html += `
                <div class="form-group form-check pl-5">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="question[]" value="${result[i].id}">
                <label class="form-check-label" for="exampleCheck1">${result[i].title}</label>
                </div>
                    `
                   }

                }
                $('#list-search-question').html(html);
            }
        });
    });
});
