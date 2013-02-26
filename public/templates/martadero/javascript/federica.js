$(document).ready(function(){
    $('input[type="text"].focus').focus();
    
    $('.closeable').click(function(){$(this).parent().fadeOut(); return false;});

    $('input[class="groupall"]').click(function(){
        if($(this).is(':checked')){
            $('input[class="check"]').attr('checked',true);
        }else{
            $('input[class="check"]').attr('checked',false);
        }
    });

    if($('#right_bar').html()==='') { $('#right_bar').css('display', 'none'); $('#content').css('paddingRight', '20px');}
    if($('#left_bar').html()==='') {  $('#left_bar').css('display', 'none');  $('#content').css('paddingLeft', '20px'); }
});
