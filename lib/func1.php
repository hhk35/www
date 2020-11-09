<?
   function latest_article($table, $loop, $char_limit) 
   {
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);

		while ($row = mysql_fetch_array($result))
		{
			$num = $row[num];
			 $len_subject = mb_strlen($row[subject], 'utf-8');
			$subject = $row[subject];

			if ($len_subject > $char_limit)
			{
				 $subject = str_replace( "&#039;", "'", $subject);               
                                                       $subject = mb_substr($subject, 0, $char_limit, 'utf-8');
				$subject = $subject."...";
			}

			$regist_day = substr($row[regist_day], 0, 10);

			echo "      
				<li><a href='./$table/view.php?table=$table&num=$num'>$subject</a> <span>$regist_day</span></li>
			";
		}
		mysql_close();
   }
/*
<ul>
    <li>
        <a href="#">삼성. 선급이 인증한 세계 최초 스마트 셔틀탱커 탄생!</a>
        <span>2020-05-28</span>
    </li>
    <li>
        <a href="#">삼성. 수출입 안전관리 최고기업 인증</a>
        <span>2020-04-29</span>
    </li>
    <li>
        <a href="#">삼성. 임직원 모급액 3억 2천만원 기부</a>
        <span>2020-03-21</span>
    </li>
</ul>
<li>
   <a href="#">단수주 일반공모 배정결과</a>
    <span>2018-04-20</span>  
</li>
<li>
   <a href="#">신주 발행가핵 확정 고액</a>
    <span>2018-04-09</span>  
</li>
<li>
   <a href="#">홈페이지 도메인 변경 안내(9/1)</a>
    <span>2015-08-25</span> 
</li>
*/
?>


