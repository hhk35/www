$(document).ready(function () {
    $('.top_btn').hide();
    let th= $('#headerArea').height() + $('.main').height();

    $(window).on('scroll',function(){
      let scroll = $(window).scrollTop();

      if(scroll>th){
          $('.top_btn').fadeIn('slow');
      }else{
          $('.top_btn').fadeOut('fast');
      }
    });

    $('.top_btn').click(function(){
      
     $("html,body").stop().animate({"scrollTop":0},'fast'); 
    }); 
});