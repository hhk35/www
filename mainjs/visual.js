// JavaScript Document

$(document).ready(function(){
  let timeonoff;
  let imageCount=3;  
  let cnt=1;  
  let direct=1;  
  let position=0; 
  let onoff=true; 
    
    $('.btn1').css('background','#aecbf0'); 
    $('.btn1').css('width','40');
    $('.gallery_text li:eq(0)').fadeIn('slow');
    
 function moveg(){
      cnt+=direct;
		if(cnt==1){
		   position=0;  
		}else if(cnt==2){
	       position=-2000;
		}else if(cnt==3){
		   position=-4000;
        }
     
      $('.gallery_text li').hide();
      $('.gallery_text li:eq('+(cnt-1)+')').fadeIn('slow');
                                                
	   for(let i=1;i<=imageCount;i++){
          $('.btn'+i).css('background','#fff');
         $('.btn'+i).css('width','20'); 
      }
      $('.btn'+cnt).css('background','#aecbf0');
      $('.btn'+cnt).css('width','40');   
                           
		$('.gallery').animate({left:position}, 'slow');
		if(cnt==imageCount)direct=-1;
        if(cnt==1)direct=1;
 }

  timeonoff= setInterval( moveg , 4000);

  $('.mbutton').click(function(event){

	let $target=$(event.target);
	clearInterval(timeonoff);

	for(let i=1; i<=imageCount; i++){
			  $('.btn'+i).css('background','#fff');
              $('.btn'+i).css('width','20');
    }
	if($target.is('.btn1')){
    	   $('.gallery').animate({left:0}, 'slow');
                cnt=1;
                direct=1;
	}else if($target.is('.btn2')){
    	   $('.gallery').animate({left:-2000}, 'slow');
                cnt=2;
	}else if($target.is('.btn3')){
    	   $('.gallery').animate({left:-4000}, 'slow');
                cnt=3;
                direct=-1;
	}
    $('.gallery_text li').hide();
    $('.gallery_text li:eq('+(cnt-1)+')').fadeIn('slow');
      
    $('.btn'+cnt).css('background','#aecbf0');
    $('.btn'+cnt).css('width','40');
      
    timeonoff= setInterval( moveg , 4000);
      
    if(onoff==false){
		   onoff=true;
		   $('.ps').css('background','url(images/stop.png)').css('backgroundSize','cover');
     }  
  });
 
  $('.ps').click(function(){ 
       if(onoff==true){
	       clearInterval(timeonoff);   
		   $(this).css('background','url(images/play.png)').css('backgroundSize','cover');
           onoff=false;   
	   }else{
		  timeonoff= setInterval( moveg , 4000); 
		   $(this).css('background','url(images/stop.png)').css('backgroundSize','cover');
		   onoff=true;
	   }
  });	
  
});




