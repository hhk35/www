<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    //새글쓰기 =>  $table='concert'
    //수정 => $table=concert $mode=modufy $num=1 $page=1

	include "../lib/dbconn.php";

	if ($mode=="modify") //수정 글쓰기면
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>삼성중공업-뉴스</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/25ed4bdcad.js" crossorigin="anonymous"></script>
    <link href="../common/css/common.css" rel="stylesheet">
    <link rel="stylesheet" href="../sub4/common/css/sub4commone.css">
    <link href="css/news.css" rel="stylesheet">
    <script src="../common/js/prefixfree.min.js"></script>
    <!--[if IE9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <? include "../common/sub_head.html" ?>
    <? $_GET['num']=2;
      include "sub4_nav.html";
    ?> 

  <article id="content">
	<div class="title_area">
                <div class="line_map">
                    <span>홈</span>&gt;
                    <span>PR센터</span>&gt;
                    <strong>뉴스</strong>
                </div>
                <h2>뉴스</h2>
      </div>
	<div id="col2">

		<div class="clear"></div>

		<div id="write_form_title">
			<span>글쓰기</span>
		</div>
		<div class="clear"></div>

<?
	if($mode=="modify") //수정모드
	{

?>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
	else  //새글쓰기모드
	{
?>
		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
?>
		<div id="write_form">
			<div class="write_line"></div>
			<ul id="write_row1">
			    <li class="col1"> 닉네임 </li>
			    <li class="col2"><?=$usernick?></li>
<?
	if( $userid && ($mode != "modify") )
	{   //새글쓰기 에서만 HTML 쓰기가 보인다
?>
				<li class="col3">
				    <input type="checkbox" name="html_ok" value="y"> HTML 쓰기
				</li>
<?
	}
?>						
			</ul>
			
			<div class="write_line"></div>
			<ul id="write_row2">
                <li class="col1"> 제목   </li>
                <li class="col2">
                    <input type="text" name="subject" value="<?=$item_subject?>" >
                </li>
			</ul>
			<div class="write_line"></div>
			<ul id="write_row3">
                <li class="col1"> 내용   </li>
                <li class="col2">
                    <textarea rows="15" cols="79" name="content"><?=$item_content?></textarea>
                </li>
			</ul>
			<div class="write_line"></div>
			<ul id="write_row4">
                <li class="col1"> 이미지파일1   </li>
                <li class="col2"><input type="file" name="upfile[]">
                </li>
			</ul>
			<div class="clear"></div>
<? 	if ($mode=="modify" && $item_file_0)
	{
?>
			<div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>
			<ul id="write_row5">
                <li class="col1"> 이미지파일2  </li>
                <li class="col2"><input type="file" name="upfile[]">
                </li>
			</ul>
<? 	if ($mode=="modify" && $item_file_1)
	{
?>
			<div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="1"> 삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>
			<div class="clear"></div>
			<ul id="write_row6">
                 <li class="col1"> 이미지파일3   </li>
                 <li class="col2"><input type="file" name="upfile[]"></li>
			</ul>
<? 	if ($mode=="modify" && $item_file_2)
	{
?>
			<div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="2"> 삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>

			<div class="clear"></div>
		</div>

		<div id="write_button">
            <button>완료</button>&nbsp;
            <a href="list.php?table=<?=$table?>&page=<?=$page?>">
            목록</a>
		</div>
           
		</form>
		</form>
		
    
	</div> <!-- end of col2 -->
  </article> <!-- end of content -->
<? include "../common/sub_foot.html" ?>
</body>
</html>