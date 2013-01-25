$(document).ready(function(){
    $('input[type="text"].focus').focus();
    
    $('.closeable').click(function(){$(this).parent().fadeOut();});

    $('input[class="groupall"]').click(function(){
        if($(this).attr('checked')==='checked'){
            $('input[class="check"]').attr('checked','checked');
        }else{
            $('input[class="check"]').removeAttr('checked');
    }});
});
