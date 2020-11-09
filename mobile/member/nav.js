/* NAV */
$(document).ready(function(){
    $('.btn').toggle(function(){
        $('#gnb').slideDown('slow');
        $('.box').show();
        $('.btn').css({'background':'url(../images/close_320.jpg)no-repeat'});
    },function(){
        $('#gnb').slideUp('fast');
        $('.box').hide();
        $('.btn').css({'background':'url(../images/menu_320.jpg)no-repeat'});
    });
    
    let onoff=[false,false,false,false];
    let arrcount=onoff.length;
    
    $('#gnb .depth1>h3').find('a').click(function(){
        let ind=$(this).parents('.depth1').index();
        let head=$(this).parents('h3');
        if(onoff[ind]==false){
            
            head.siblings('ul').slideDown('slow');
            head.parents('.depth1').siblings('li').find('ul').slideUp('fast');
            for(var i=0; i<arrcount; i++) onoff[i]=false; 
            onoff[ind]=true;
            $('.fas').css('transform','rotate(0deg)');
            head.siblings('em').find('.fas').css('transform','rotate(180deg)');
        }else{
            head.siblings('ul').slideUp('fast');
            onoff[ind]=false;
            $('.fas').css('transform','rotate(0deg)');
        }
    });
});