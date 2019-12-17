$(document).ready(function () {
    $("#search").on('keyup', function () {
        let value = $(this).val();

        $.ajax({
            url: 'http://127.0.0.1:8000/categories/search',
            type: 'GET',
            dataType: 'json',
            data: {keyword: value},

            success: function (result) {
                let html = '';
                $.each(result, function (index, item) {
                    html += `<tr class="category-${item.id}">
                    <td><h5><i class="fa">${item.name}</i></h5></td>
                     <td><button type="button"  class="btn btn-danger text-white delete-category" data-id="${item.id}" onclick="return confirm('Are You Delete???')">DELETE</button></td>
                </tr>
                    `
                });
                $('#list-categories').html(html);
            }
        });
    });

    $('body').on('click', '.delete-category', function () {
        let categoryId = $(this).data('id');
        alert(categoryId)
        $.ajax({
            url: 'http://127.0.0.1:8000/categories/' + categoryId + '/delete',
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                $('.category-' + categoryId).remove();
            },
            error: function (error) {

            }
        });
    });
});
