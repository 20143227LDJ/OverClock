<?php
date_default_timezone_set('Asia/Seoul');

$url = "naver.com";

$ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HEADER, 1);

  $response = curl_exec($ch);
  
  // Retudn headers seperatly from the Response Body
  $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
  $headers = substr($response, 0, $header_size);
  $body = substr($response, $header_size);
  
curl_close($ch);

header("Content-Type:text/plain; charset=UTF-8");
echo $headers;
echo $body;

    $to = "tovin4613@naver.com";

    $subject = "PHP 메일 발송";

    $contents = "PHP mail()함수를 이용한 메일 발송 테스트\n";

    $contents = $contents. "현재 날짜 : ". date("Y-m-d\n");
    $contents = $contents. "현재 시간 : ". date("H:i:s\n");
    $contents = $contents. "현재 일시 : ". date("Y-m-d H:i:s\n");
    $contents = $contents. $url. "의 서버 시간 : ". $headers;

    $headers = "From: tovin4613@naver.com\r\n";

   mail($to, $subject, $contents, $headers);
?>