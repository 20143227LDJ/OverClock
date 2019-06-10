<?php
    session_start(); // 세션 시작

    $name = "url"; // 쿠키의 이름값
    $value = "http://". $_POST['url']; // 쿠키의 데이터값
    setcookie($name, $value); // 서버시간을 가져오기 위해 url 쿠키 생성

    $mysqli = new mysqli("localhost", "root", "123456", "overclock"); // MySQL와 연결

    $sql = "insert into rankdb (url) values('$value')"; // 쿼리문 선언(실시간 순위를 위해 db에 insert문으로 데이터 삽입)

    $mysqli->query($sql); // 쿼리문 실행

    header('Location: ../index.php'); // index.php로 이동
?>