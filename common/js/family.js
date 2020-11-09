
$(document).ready(function() {
    $('.arrow').toggle(function(){
         $('.family_site ul').slideDown(500);
         $(this).find('span').text('▲');
    }, function(){
         $('.family_site ul').slideUp(500);
         $(this).find('span').text('▼');
    });
    
});

