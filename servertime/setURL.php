<?php
    session_start(); // 세션 시작

    $name = "url";
    $value = "http://". $_POST['url'];
    setcookie($name, $value); // url 쿠키 생성

    $id = $_SESSION['userid']; // 로그인했을 때 아이디 값 가져오기

    $mysqli = new mysqli("localhost", "root", "123456", "overclock");

    $sql = "insert into rankdb (url)";
    $sql = $sql. "values('$value')";

    $mysqli->query($sql);


    if(isset($_SESSION['userid'])){
        $sql2 = "UPDATE user_info SET saveurl = '$value' WHERE id = '$id'";

        $mysqli->query($sql2);
    }



    header('Location: ../index.php'); // index.php로 이동
?>