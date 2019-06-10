<?php
 session_start(); // 세션 시작

	$name = "url";
	$url=$_COOKIE[$name]; // setURL.php에서 만든 쿠키값을 $url에 넣음
	
	file_get_contents($url);
	$headers = print_r($http_response_header, true);

	$strTok =explode('Date' , $headers); // $headers를 'Date'기준으로 스플릿
	$strTok2 =explode(' ' , $strTok[1]);  // $strTok[1]를 ' '(공백)기준으로 스플릿

	$strTok2[5] = $strTok2[5]. ":". $url; // 

	$strTok3 =explode(':' , $strTok2[5]); // $strTok2[5]를 ':'기준으로 스플릿 (응답 헤더의 Date부분 시:분:초 스플릿)

	$strTok3[0] = $strTok3[0] + 9; // 표준시간에 +9를 해서 한국시간으로 만듬
	$strTok3[0] = $strTok3[0] % 24; // 시간값이 24보다 높으면 안되서 24로 나누어 나머지 값을 넣음
	$strTok3[2] = $strTok3[2]+"초"; // sec
	$cnt = count($strTok3);

	for($i = 0 ; $i < $cnt ; $i++){ // 여러개의 데이터를 index.php에 보내기 위해 반복문으로 echo 출력

		echo($strTok3[$i]. "\n"); 

	}

?>