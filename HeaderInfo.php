<?php
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
?>