$(document).ready(function(){
    var screenHeight = $(window).height();
    $("#content").css('margin-top',screenHeight);
    $('.down').click(function(e){
        e.preventDefault();
        screenHeight = $(window).height();
        $('html,body').animate({'scrollTop':screenHeight}, 1000);
    });
});