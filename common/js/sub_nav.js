 $(document).ready(function() {
          var num = '<?=$_GET['num']?>';
         
          alert(num);
          if(num==1){
              $('.subnav ul li:eq(0)').find('a').addClass('current');
          }else if(num==2){
              $('.subnav ul li:eq(1)').find('a').addClass('current');
          }else if(num==3){
              $('.subnav ul li:eq(2)').find('a').addClass('current');
          }else if(num==4){
              $('.subnav ul li:eq(3)').find('a').addClass('current');
          }
       });
