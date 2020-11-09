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