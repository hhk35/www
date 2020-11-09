/* business */
$(document).ready(function(){
    let cnt=1;
    let totalcnt=5;

    $('.right').click(function(){
        cnt++;
        if(cnt>totalcnt){
            cnt=1;
        }
        $('.business li').first().appendTo('.business ul');
    });
    
    $('.left').click(function(){
        cnt--;
        if(cnt<1){
            cnt=totalcnt;
        }
        $('.business li').last().prependTo('.business ul');
    });
});