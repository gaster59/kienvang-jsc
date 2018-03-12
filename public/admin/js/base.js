$(function(){
    $('.chk_all').click(function(){
        if($(this).is(":checked")){
            $('.chk').each(function(){
                $(this).prop('checked', true);
            });
        }else{
            $('.chk').each(function(){
                $(this).prop('checked', false);
            });
        }
    });
});