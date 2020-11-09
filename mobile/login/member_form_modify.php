<?
    session_start();

    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
    <meta name="format-detection" content="telephone=no">
	<title>회원정보수정</title>
	<link rel="stylesheet" href="../css/common.css">
	<link rel="stylesheet" href="css/modify.css">
	<script src="https://kit.fontawesome.com/25ed4bdcad.js" crossorigin="anonymous"></script>
	
	<script src="../js/jquery-1.12.4.min.js"></script>
    <script src="../js/jquery-migrate-1.4.1.min.js"></script>
    <script>
	 $(document).ready(function() {

    //nick 중복검사		 
    $("#nick").keyup(function() {    
        var nick = $('#nick').val();

        $.ajax({
            type: "POST",
            url: "../member/check_nick.php",
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
   function check_id()
   {
     window.open("../member/check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("../member/check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
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
<?
    //$userid='aaa';
    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-0000-0000
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>
<body>
	 <? include "head.html" ?>
	 
	<article id="content">  
	  
	  <h2>삼성중공업 회원가입</h2>
	  <form  name="member_form" method="post" action="modify.php"> 
		
     <ul>
     	<li>
     	    <dl>
                <dt><label for="id">아이디</label></dt>
                <dd>
                    <?= $row[id] ?>
                </dd>
     		</dl>
     	</li>
     	<li>
     	    <dl>
                <dt><label for="pass">비밀번호</label></dt>
                <dd>
                     <input type="password" name="pass" value="">
                </dd>
     		</dl>
     	</li>
     	<li>
     	    <dl>
                <dt><label for="pass_confirm">비밀번호확인</label></dt>
                <dd>
                    <input type="password" name="pass_confirm" value="">
                </dd>
     		</dl>
     	</li>
     	<li>
     	    <dl>
                <dt><label for="name">이름</label></dt>
                <dd>
                    <input type="text" name="name" value="<?= $row[name] ?>"> 
                </dd>
     		</dl>
     	</li>
     	<li>
     	    <dl>
                <dt><label for="nick">닉네임</label></dt>
                <dd>
                     <input type="text" name="nick" id="nick" value="<?= $row[nick] ?>">
                     <span id="loadtext2"></span>
                </dd>
     		</dl>
     	</li>
     	<li>
     	    <dl class="phone">
                <dt>휴대폰</dt>
                    <dd>
                      <input type="text" class="hp" name="hp1" value="<?= $hp1 ?>"> 
             - <input type="text" class="hp" name="hp2" value="<?= $hp2 ?>"> - <input type="text" class="hp" name="hp3" value="<?= $hp3 ?>">

                </dd>
     		</dl>
     	</li>
     	<li>
     	    <dl class="mail">
                <dt>이메일</dt>
                <dd>
                  <input type="text" id="email1" name="email1" value="<?= $email1 ?>"> @ <input type="text" name="email2" 
			           value="<?= $email2 ?>">
                </dd>
     		</dl>
     	</li>
     	<li class="modi">
            <a href="#" onclick="check_input()">정보수정</a>&nbsp;&nbsp;
            <a href="#" onclick="reset_form()">다시작성</a>
     	</li>
     </ul>

	 </form>
	  
	</article>
	 <? include "foot.html" ?>
</body>
</html>


