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
                    html += `
                <tr class="category-' + item.id +'">
                    <td><h5><i class="fa">${item.name}</i></h5></td>
                     <td><button type="button" class="btn btn-danger text-white">DELETE</button></td>
                </tr>
                    `
                });
                $('#list-categories').html(html);
            }
        });
    });

    $("body").on('click','.delete-category', function () {
        if (confirm('Are You Sure Delete??')) {
            let categoryId = $(this).data('id');
            $.ajax({
                url: 'http://127.0.0.1:8000/categories/'+categoryId+'/delete',
                type: 'GET',
                dataType: 'json',
                success: function (result) {
                    $('.category-' + categoryId).remove();
                }
            });
        }
    });
});
