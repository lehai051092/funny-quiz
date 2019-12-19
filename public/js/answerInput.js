$(document).ready(function(){
    let i=1;
    $("#insertAnswer").click(function(){
        console.log('1');
        // i++;
        $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]"  class="form-control name_list" /></td>' +
            '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
    $(document).on('click', '.btn_remove', function(){
        let button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
    });
});
