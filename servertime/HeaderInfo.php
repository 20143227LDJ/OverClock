<?php
 session_start(); // 세션 시작

	$name = "url";
	$id = $_SESSION['userid'];

	if(isset($_SESSION['userid'])){ // 로그인 세션이 있으면 db에 저장 되어있는 url 불러줌
		$mysqli = new mysqli("localhost", "root", "123456", "overclock");

        $sql = "SELECT * FROM user_info WHERE id='$id'";

		$result = $mysqli->query($sql);
		
		$row = mysqli_fetch_assoc($result);

		$url = $row['saveurl'];
    }else{
		$url=$_COOKIE[$name];
	}
	
	file_get_contents($url);
	$headers = print_r($http_response_header, true);

	$strTok =explode('Date' , $headers); // 헤더 스플릿
	$strTok2 =explode(' ' , $strTok[1]);  // 헤더 스플릿의 스플릿

	$strTok2[5] = $strTok2[5]. ":". $url;

	$strTok3 =explode(':' , $strTok2[5]); // 헤더의 Date부분 시:분:초 스플릿

	$strTok3[0] = $strTok3[0] + 9;
	$strTok3[0] = $strTok3[0] % 24;
	$strTok3[2] = $strTok3[2]+"초";
	$cnt = count($strTok3);

	for($i = 0 ; $i < $cnt ; $i++){

		echo($strTok3[$i]. "\n");

	}

?>