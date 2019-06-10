<?php
 session_start();

include_once "coolsms.php";

 $mysqli = new mysqli("localhost", "root", "123456", "overclock"); // MySQL와 연결

 $id=$_SESSION['userid']; // 로그인했을 때 아이디 값 가져오기

 $sql = "SELECT * FROM userinfo WHERE id='$id'"; // 쿼리문 선언(id값을 받아서 userinfo테이블에 있는 phoneNum을 찾기 위해 검색)
 $result = $mysqli->query($sql); // 쿼리문 실행
 $row = mysqli_fetch_assoc($result); // 쿼리문 실행값을 배열로 변경(ex. $row['phoneNum'])

 $date=$_POST['date']; // 사용자가 설정한 날짜 값을 받는다
 $time=$_POST['time']; // 사용자가 설정한 시간 값을 받는다
 $phoneNum = $row['phoneNum']; // 테이블에 있는 phoneNum값을 변수 $phoneNum에 넣는다

 $datereplace = str_replace("-", "", $date);
 $timereplace = str_replace(":", "", $time);

 // API키
 $apikey = 'NCS8JWGOM04HJVHN';
 $apisecret = 'LGWZ8VDCVA1Q1LUA1X1YOGFP1YEEOZKY';

 $rest = new coolsms($apikey, $apisecret);

// 문자 정보
$options = new StdClass();
$options->timestamp = (string)time();
$options->to = $phoneNum; // 받는 번호
$options->from = '01094354116'; // 보내는 번호
$options->text = '티켓팅 준비할 시간입니다.'; // 문자 내용
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
