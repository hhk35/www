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
<?
	include "../lib/dbconn.php";
    //세션변수(로그인)
    //$userid='id'
    
  if (!$scale){
    $scale=10;			// 한 화면에 표시되는 글 수(디폴트/처음)
  }
    
    if ($mode=="search") //검색을 통한 리스트출력
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from greet where $find like '%$search%' order by num desc";
	}
	else //일반 리스트
	{
		$sql = "select * from greet order by num desc";
	}

	$result = mysql_query($sql, $connect); //35개의 레코드

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     //10의 배수면...
		$total_page = floor($total_record/$scale);      
	else  //10의 배수가 아니면
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>
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
        <div class="content_area">
            <h3></h3>
        </div>
        
	<div id="col2">
		<form  name="board_form" method="post" action="list.php?mode=search"> 
		
		<div id="list_search">
		    <div id="list_search1">▷ 총 <?= $total_record ?> 개의 게시물이 있습니다. </div>
			<div id="list_search2"></div>
			<div id="list_search3">
				<select name="find">
                    <option value='subject'>제목</option>
                    <option value='content'>내용</option>
                    <option value='nick'>별명</option>
                    <option value='name'>이름</option>
				</select></div>
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><button>검색</button></div>
		</div>
		</form>
		
		<select name="scale" onchange="location.href='list.php?scale='+this.value">
            <option value=''>보기</option>
            <option value='5'>5</option>
            <option value='10'>10</option>
            <option value='15'>15</option>
            <option value='20'>20</option>
        </select>
		
		

		<div class="clear"></div>

		<div id="list_top_title">
			<ul>
				<li id="list_title1">번호</li>
				<li id="list_title2">제목</li>
				<li id="list_title3">작성자</li>
				<li id="list_title4">등록일</li>
				<li id="list_title5">조회</li>
			</ul>		
		</div>

		<div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];

      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  

	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

?>
			<div id="list_item">
				<div id="list_item1"><?= $number ?></div>
				<div id="list_item2"><a href="view.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a></div>
				<div id="list_item3"><?= $item_nick ?></div>
				<div id="list_item4"><?= $item_date ?></div>
				<div id="list_item5"><?= $item_hit ?></div>
			</div>
<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
           if($mode=="search"){
             echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
            }else{    
            
			  echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
           }
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
				</div>
				<div id="button">
					<a href="list.php?page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="write_form.php">글쓰기</a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->
		
        </div> <!-- end of list content -->

		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </article> <!-- end of content -->
    <? include "../common/sub_foot.html" ?>   
</body>
</html>