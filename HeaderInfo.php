<?php
$name = "url";

$url=$_COOKIE[$name];
//$url = "door.deu.ac.kr";

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