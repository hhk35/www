$(document).ready(function () {

         //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            
            var scroll = $(window).scrollTop();
            //스크롤top의 좌표를 담는다       

            $('.text').text(scroll);
            //스크롤 좌표의 값을 찍는다.

            //스크롤의 거리의 범위를 처리
            if(scroll>=300 && scroll<1000){
                $('.infor').addClass('boxMove');
            }else if(scroll>=1000 && scroll<1500){
                 $('.content_area .content_bottom').addClass('boxMove2');
                
            }
          }); 
    });


    