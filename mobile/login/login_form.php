<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="format-detection" content="telephone=no">
    <title>삼성중공업-로그인</title>
    <link rel="stylesheet" href="../css/common.css">
    <link href="css/member.css" rel="stylesheet"> 
    <script src="https://kit.fontawesome.com/25ed4bdcad.js" crossorigin="anonymous"></script>
	<script src="../js/jquery-1.12.4.min.js"></script>
    <script src="../js/jquery-migrate-1.4.1.min.js"></script>
</head>
<body>
<? include "head.html" ?>
	<div id="col2">
        <form  name="member_form" method="post" action="login.php"> 
		<div id="title">
			<h2>삼성중공업 로그인</h2>
		</div>
       
		<div id="login_form">
		     <p>삼성중공업의 회원이신가요?</p>
			 <div class="clear"></div>

			 <div id="login1">
				
			 </div>
			 <div id="login2">
				<div id="id_input_button">
					<div id="id_pw_title">
						<ul>
						<li>아이디</li>
						<li>비밀번호</li>
						</ul>
					</div>
					<div id="id_pw_input">
						<ul>
						<li><input type="text" name="id" class="login_input"></li>
						<li><input type="password" name="pass" class="login_input"></li>
						</ul>						
					</div>
					<div id="login_button">
						<button>로그인</button>
					</div>
				</div>
				<div class="clear"></div>

				<div id="login_line"></div>
				<div id="join_button"><a href="../member/join.html">회원가입</a></div>
			 </div>			 
		</div> <!-- end of form_login -->

	    </form>
	</div> <!-- end of col2 -->  
    <? include "foot.html" ?>
</body>
</html>