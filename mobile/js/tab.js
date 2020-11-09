// JavaScript Document

$(document).ready(function(){
  let cnt=$('.tabs .tab').length ;

  $('#content .list:eq(0)').show();
  $('.tabs .tab1').addClass('on');
  
  $('.tabs .tab').each(function (index) {  
    $(this).click(function(){
	  $('#content .list').hide();
	  $('#content .list:eq('+index+')').show();
	  for(let i=1; i<=cnt; i++){
           $('.tab'+i).removeClass('on');
      }
      $(this).addClass('on');
   });
  });
});