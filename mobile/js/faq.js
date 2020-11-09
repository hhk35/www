// FAQ

$(document).ready(function(){
    let question=$('.accordion .question');
    
    $('.question dl .q .trigger').click(function(){
        let myquestion=$(this).parents('.question');
        
        if(myquestion.hasClass('hide')){
            question.removeClass('show').addClass('hide');
            question.find('.answer').slideUp(300);
            question.find('em i').css('transform','rotate(0deg)');
            myquestion.removeClass('hide').addClass('show');
            myquestion.find('.answer').slideDown(500);
            myquestion.find('em i').css('transform','rotate(180deg)');
        }else if(myquestion.hasClass('show')){
            myquestion.removeClass('show').addClass('hide');
            myquestion.find('.answer').slideUp(300);
            myquestion.find('em i').css('transform','rotate(0deg)');
        }
    });
});

// index FAQ

$(document).ready(function(){
    let position=0;
    let movesize=18;
    let timeonoff;
    
    function moveNitice(){
        position-=movesize;
        $('.slide').stop().animate({top:position},'slow',function(){
            if(position==-72){
                $('.slide').css('top',0);
                position=0;
            }
        });
    }
    timeonoff=setInterval(moveNitice,2000);
    $('.slide ul').after($('.slide ul').clone());
    $('.slide ul').hover(function(){
        clearInterval(timeonoff);},function(){
        timeonoff=setInterval(moveNitice,2000);
    });
});