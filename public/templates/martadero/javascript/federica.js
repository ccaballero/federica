$(document).ready(function(){
    $.datepicker.regional['es'] = {
        prevText: '<Previo',
        nextText: 'Siguiente>',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        weekHeader: 'Sm', weekStatus: '',
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        dateFormat: 'yy-mm-dd', firstDay: 1,
        changeMonth: true
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $('.datepicker').datepicker();

    // tabber section
    $('.tab_contents').hide()
    if(window.location.hash!==''){
        $(window.location.hash).fadeIn()
        $('#tabber .tab a[href="'+window.location.hash+'"]').addClass('active')
    }else{
        $('.tab_contents:first').fadeIn()
        $('#tabber .tab a[href="#information"]').addClass('active')
    }

    $('#tabber ul#tabs li a').click(function(){
        var activeTab = $(this).attr('href')
        $('#tabber ul li a').removeClass('active')
        $(this).addClass('active')
        $('#tabber .tab_details .tab_contents').hide()
        $(activeTab).fadeIn()
    })
    // end tabber
    
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
