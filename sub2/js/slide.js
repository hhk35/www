// JavaScript Document

$(document).ready(function(){
    let position=0;
    let movesize=$('figure').width();
    
    $('.product .half').after($('.product .half').clone());
    
    $('.right').click(function(){
        if(position==-6720){
            $('.product').css('left',0);
            position=0;
        }
        position-=movesize;
        $('.product').stop().animate({left:position},'slow',function(){
            if(position==-6720){
                $('.product').css('left',0);
                position=0;
            }
        });
    });
    $('.left').click(function(){
        if(position==0){
            $('.product').css('left',-6720);
            position=-6720;
        }
        position+=movesize;
        $('.product').stop().animate({left:position},'slow',function(){
            if(position==0){
                $('.product').css('left',-6720);
                position=-6720;
            }
        });
    });
});