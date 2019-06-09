<?php
 session_start();

include_once "coolsms.php";

 $mysqli = new mysqli("localhost", "root", "123456", "overclock");

 $id=$_SESSION['userid'];

 $sql = "SELECT * FROM user_info WHERE id='$id'";
 $result = $mysqli->query($sql);
 $row = mysqli_fetch_assoc($result);

 $date=$_POST['date'];
 $time=$_POST['time'];
 $phoneNum = $row['phoneNum'];

 $datereplace = str_replace("-", "", $date);
 $timereplace = str_replace(":", "", $time);

 // API키
 $apikey = 'NCS8JWGOM04HJVHN';
 $apisecret = 'LGWZ8VDCVA1Q1LUA1X1YOGFP1YEEOZKY';

 $rest = new coolsms($apikey, $apisecret);

// 문자 정보
$options = new StdClass();
$options->timestamp = (string)time();
$options->to = $phoneNum;
$options->from = '01094354116';
$options->text = '티켓팅 준비할 시간입니다.';
$options->datetime = $datereplace. $timereplace;
$options->app_version = 'test app 1.2';  // application name and version	 
$options->type = 'SMS'; // SMS, MMS, LMS, ATA

// 문자 전송
 if($phoneNum == ""){
    echo "<script>alert('로그인을 안하셨거나 폰번호를 잘못 입력하신거 같아요 ㅠㅠ'); location.href='../index.php';</script>";
 }
 else{ // 에러 발생 시 에러값 출력
    $rest->send($options);
    echo "<script>alert('문자 전송 성공!!'); location.href='../index.php';</script>";
}
