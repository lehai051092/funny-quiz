$(document).ready(function () {

    $('#filter').click(function () {
        let title = $('#title_id').val();
        let type = $('#type_id').val();
        let category = $('#category_id').val();
        let titleTextResult= $('#title_id option:selected').text();
        let titleText = (titleTextResult!=='Title')?titleTextResult:" ";
        let typeTextResult = $('#type_id option:selected').text();
        let typeText = (typeTextResult!=='Type')?typeTextResult:" ";
        let categoryTextResult = $('#category_id option:selected').text();
        let categoryText = (categoryTextResult!=='Category')?categoryTextResult:" ";
        // console.log(title,type,category)
        $.ajax({
            url: 'http://127.0.0.1:8000/admins/filter-question',
            method: 'GET',
            dataType: 'json',
            data: {
                title: title,
                type_id: type,
                category_id: category,
            },
            success: function (result) {
                let printHtml = "";
                for (let i = 0; i < result.length; i++) {

                    let category = '';
                    switch (result[i].category_id) {
                        case 1:
                            category = "Tiếng Anh";
                            break;
                        case 2:
                            category = "Toán";
                            break;
                        default:
                            category = "null";
                    }
                    let type = '';
                    switch (result[i].type_id) {
                        case 1:
                            type = "Many Question";
                            break;
                        case 2:
                            type = "True/False";
                            break;
                        default:
                            type = "null";
                    }
                    printHtml += `
                   <tr>
                            <td><a class="showDetailQuestion" data-toggle="modal" data-target="#exampleModal">
                                    <h5 style="color:black;">${result[i].title}</h5>
                                </a></td>
                         <td style="display: none"><h5 >${result[i].desc}</h5></td>
                         <td style="display: none"><h5 >${result[i].content}</h5></td>
                         <td>
                                    <h5>${category}</h5>
                        </td>
                            <td>
                                   <h5>${type}</h5>
                          </td>
                             <td>
                              <a href="http://127.0.0.1:8000/questions/${result[i].id}/delete"
                                   class="btn btn-danger text-white delete-category" style="color: red"
                                 onclick="return confirm('Are you want delete ?')">Del</a>
                              <a href="http://127.0.0.1:8000/questions/${result[i].id}/edit"
                                 class="btn btn-primary text-white delete-category" style="color: red"
                               >Edit</a>
                            </td>
                     </tr>
                    `
                }

                    $("#print_filter").html(printHtml);
                    $("#count_filter").html(`Filter <b>${result.length}</b> results with your selection <b style="color: ">Title</b>: <b style="color: red">${titleText}</b> , <b style="color: ">Type</b>: <b style="color: red">${typeText}</b>, <b style="color: ">Category</b>: <b style="color: red">${categoryText}</b>.`);

            },
            errors: function (errors) {

            },

        })
    })
    $('.showDetailQuestion').click(function () {
        let question = $(this).parent("td").text();
        let desc = $(this).parent("td").next('td').text();
        let content = $(this).parent("td").next('td').next('td').text();

        $('#questionDetail').val(question);
        $('#descDetail').val(desc);
        $('#contentDetail').val(content);
    })
});
