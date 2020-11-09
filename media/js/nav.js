$(document).ready(function() {
   $(".btn").toggle(function() {
	 $("#gnb").slideDown('slow');
   }, function() {
	 $("#gnb").slideUp('fast');
   });
   
    var current=0; //모바일 해상도
   $(window).resize(function(){ 
      var screenSize = $(window).width(); 
      if( screenSize > 768){
        $("#gnb").show();
		 current=1; //모바일 이상의 해상도
      }
      if(current==1 && screenSize < 768){
        $("#gnb").hide();
         current=0;
      }
    }); 
        
  });

$(document).ready(function () {
    $('.top_btn').hide();
    var th= $('#headerArea').height() + $('.visual').height();

    $(window).on('scroll',function(){
      var scroll = $(window).scrollTop();

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
/*
$(document).ready(function(){
        
        const scroll = $(window).scrollTop();
		$(window).bind('scroll',function(){
            if(scroll>1000){
                $('#headerArea').css('background','rgba(0,0,0,.9)');
            }else{
                $('#headerArea').css('background','rgba(0,0,0,.6)');
            }
        });
});
*/