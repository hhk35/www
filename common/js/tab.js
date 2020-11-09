// JavaScript Document

$(document).ready(function(){
  let cnt=$('.tabs .tab').length ;  //탭메뉴개수  ***

  $('.content_area .list:eq(0)').show(); //첫번째 내용만 보여라
  $('.tabs .tab1').addClass('on');
  
  $('.tabs .tab').each(function (index) {  // index=> 0 1 2
    $(this).click(function(){   //각각의 탭메뉴를 클릭하면 
	  $('.content_area .list').hide(); // 모든 탭내용을 안보이게 한다
	  $('.content_area .list:eq('+index+')').show();
	  for(let i=1; i<=cnt; i++){
           $('.tab'+i).removeClass('on');
      } //모든 탭메뉴 비활성화
      $(this).addClass('on'); 
   });
  });
});