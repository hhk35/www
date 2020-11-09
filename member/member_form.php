<? 
	session_start(); 
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>삼성중공업-회원가입</title>
	<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/25ed4bdcad.js" crossorigin="anonymous"></script>
    <link href="../common/css/common.css" rel="stylesheet">
	<link rel="stylesheet" href="css/member_form.css">
	
	
	<script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
	<script src="../common/js/prefixfree.min.js"></script>
    <!--[if IE9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<script>
	 $(document).ready(function() {
  
   
 
 //id 중복검사
 $("#id").keyup(function() {    // id입력 상자에 id값 입력시
    var id = $('#id').val(); //a

    $.ajax({
        type: "POST",
        url: "check_id.php",
        data: "id="+ id,  
        cache: false, 
        success: function(data)  //자동
        {
             $("#loadtext").html(data);
        }
    });
});
		 
//nick 중복검사		 
$("#nick").keyup(function() {    // id입력 상자에 id값 입력시
    var nick = $('#nick').val();

    $.ajax({
        type: "POST",
        url: "check_nick.php",
        data: "nick="+ nick,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext2").html(data);
        }
    });
});		 


});
	
	
	
	</script>
	<script>
   

  
   function check_input()
   {
      if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");    
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit(); 
		   // insert.php 로 변수 전송
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
</head>
<body>
	 <? include "../common/sub_head.html" ?>
	 
	<article id="content">  
	  
	  <h2>삼성중공업 회원가입</h2>
	  <form  name="member_form" method="post" action="insert.php"> 
		
     <ul>
     	<li>
     	    <dl>
                <dt><label for="id">아이디</label></dt>
                <dd>
                     <input type="text" name="id" id="id" required>
                     <span id="loadtext"></span>
                </dd>
     		</dl>
     	</li>
     	<li>
     	    <dl>
                <dt><label for="pass">비밀번호</label></dt>
                <dd>
                     <input type="password" name="pass" id="pass" required>
                </dd>
     		</dl>
     	</li>
     	<li>
     	    <dl>
                <dt><label for="pass_confirm">비밀번호확인</label></dt>
                <dd>
                    <input type="password" name="pass_confirm" id="pass_confirm"  required>
                </dd>
     		</dl>
     	</li>
     	<li>
     	    <dl>
                <dt><label for="name">이름</label></dt>
                <dd>
                    <input type="text" name="name" id="name"  required> 
                </dd>
     		</dl>
     	</li>
     	<li>
     	    <dl>
                <dt><label for="nick">닉네임</label></dt>
                <dd>
                     <input type="text" name="nick" id="nick"  required>
                     <span id="loadtext2"></span>
                </dd>
     		</dl>
     	</li>
     	<li>
     	    <dl class="phone">
                <dt>휴대폰</dt>
                    <dd>
                        <label class="hidden" for="hp1">전화번호앞3자리</label>
                        <select class="hp" name="hp1" id="hp1"> 
                      <option value='010'>010</option>
                      <option value='011'>011</option>
                      <option value='016'>016</option>
                      <option value='017'>017</option>
                      <option value='018'>018</option>
                      <option value='019'>019</option>
                  </select>  - 
                  <label class="hidden" for="hp2">전화번호중간4자리</label><input type="text" class="hp" name="hp2" id="hp2"  required> - <label class="hidden" for="hp3">전화번호끝4자리</label><input type="text" class="hp" name="hp3" id="hp3"  required>

                </dd>
     		</dl>
     	</li>
     	<li>
     	    <dl class="mail">
                <dt>이메일</dt>
                <dd>
                  <label class="hidden" for="email1">이메일아이디</label>
                    <input type="text" id="email1" name="email1"  required> @ 
                    <label class="hidden" for="email2">이메일주소</label>
                    <input type="text" name="email2" id="email2"  required>
                </dd>
     		</dl>
     	</li>
     	<li>
            <a href="#" onclick="check_input()">가입하기</a>&nbsp;&nbsp;
            <a href="#" onclick="reset_form()">가입취소</a>
     	</li>
     </ul>

	 </form>
	  
	</article>
	 <? include "../common/sub_foot.html" ?>
</body>
</html>


