$(document).ready(function(){
    $('#headerArea').hover(function(){
        $('.dropdownmenu .menu ul').fadeIn('normal',function(){$(this).stop();});
        $('#headerArea').animate({height:260},'fast').clearQueue();
    },function(){
        $('.dropdownmenu .menu ul').fadeOut('fast');
        $('#headerArea').animate({height:110},'fast').clearQueue();
    });
    
    $('.dropdownmenu .menu .depth1').on('focus',function(){
        $('.dropdownmenu .menu ul').slideDown('fast');
        $('#headerArea').animate({height:260},'fast').clearQueue();  
    });

    $('.dropdownmenu .m5 li:last').find('a').on('blur',function(){
        $('ul.dropdownmenu li.menu ul').slideUp('fast');
        $('#headerArea').animate({height:110},'fast').clearQueue();
    });   
});