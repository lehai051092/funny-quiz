$(function(){
    var loading = $('#loadbar').hide();
    $(document)
        .ajaxStart(function () {
            loading.show();
        }).ajaxStop(function () {
        loading.hide();
    });

    // $("label.btn").on('click',function () {
    //     var choice = $(this).find('input:radio').val();
    //     $('#loadbar').show();
    //     $('#quiz').fadeOut();
    //     setTimeout(function(){
    //         $( "#answer" ).html(  $(this).checking(choice) );
    //         $('#quiz').show();
    //         $('#loadbar').fadeOut();
    //         /* something else */
    //     }, 1500);
    // });

    $ans = 3;

    $("#btn_").on('click', function () {
        var checkbox_value = "";
        $(":checkbox").each(function () {
            var ischecked = $(this).is(":checked");
            if (ischecked) {
                checkbox_value += $(this).val() + "|";
            }
        });
        alert(checkbox_value);
        // your awesome code calling ajax
    });
    $.fn.checking = function(ck) {
        if (ck != $ans)
            return 'INCORRECT';
        else
            return 'CORRECT';
    };
});
