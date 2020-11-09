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
    <title>삼성중공업-공지사항</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/25ed4bdcad.js" crossorigin="anonymous"></script>
    <link href="../common/css/common.css" rel="stylesheet">
    <link rel="stylesheet" href="../sub5/common/css/sub5commone.css">
    <link href="css/greet.css" rel="stylesheet">
    <script src="../common/js/prefixfree.min.js"></script>
    <!--[if IE9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <? include "../common/sub_head.html" ?>
    <? $_GET['num']=1;
      include "sub5_nav.html";
    ?> 
    
  <article id="content">
        <div class="title_area">
            <div class="line_map">
                <span>홈</span>&gt;
                <span>고객지원</span>&gt;
                <strong>공지사항</strong>
            </div>
            <h2>공지사항</h2>
        </div>
       
	<div id="col2">        
		<div class="clear"></div>

		<div id="write_form_title">
			<span>글쓰기</span>
		</div>
		<div class="clear"></div>

		<form  name="board_form" method="post" action="insert.php"> 
		<div id="write_form">
			<div class="write_line"></div>
			<ul id="write_row1">
				<li class="col1"> 닉네임 </li>
				<li class="col2"><?=$usernick?></li>
				<li class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</li>
			</ul>
			<div class="write_line"></div>
			<ul id="write_row2">
                <li class="col1"> 제목   </li>
                <li class="col2">
                    <input type="text" name="subject">
                </li>
			</ul>
			<div class="write_line"></div>
			<ul id="write_row3">
                <li class="col1"> 내용   </li>
                <li class="col2">
                    <textarea rows="15" cols="79" name="content"></textarea>
                </li>
			</ul>
			<div class="write_line"></div>
		</div>

		<div id="write_button"><button>완료</button>&nbsp;
								<a href="list.php?page=<?=$page?>">목록</a>
		</div>
		</form>

	</div> <!-- end of col2 -->
  </article> <!-- end of content -->
<? include "../common/sub_foot.html" ?>

</body>
</html>