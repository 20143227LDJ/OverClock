<?php
$name = "url";

$url=$_COOKIE[$name];
//$url = "door.deu.ac.kr";

$ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HEADER, 1);

  $response = curl_exec($ch);
  
  $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
  $headers = substr($response, 0, $header_size);
  $body = substr($response, $header_size);
  
curl_close($ch);

header("Content-Type:text/plain; charset=UTF-8");

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