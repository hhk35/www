$(document).ready(function(){
    var screenSize=$(window).width();
    
    function screenW(){
        if(screenSize>640){
            $('.img1').attr('src','images/rami.jpg');
            $('.img2').attr('src','images/ben.jpg');
            $('.img3').attr('src','images/joseph.jpg');
        }else{
            $('.img1').attr('src','images/rami640.jpg');
            $('.img2').attr('src','images/ben640.jpg');
            $('.img3').attr('src','images/joseph640.jpg');
        }
    };
    screenW();
    
    $(window).resize(function(){
        screenSize=$(window).width();
        
        screenW();
    });
});