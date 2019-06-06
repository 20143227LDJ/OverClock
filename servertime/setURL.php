<?php
 $name = "url";
 $value = "http://". $_POST['url'];
 setcookie($name, $value); // url 쿠키 생성


 $mysqli = new mysqli("localhost", "root", "123456", "overclock");

 $sql = "insert into rankdb (url)";
 $sql = $sql. "values('$value')";

 $mysqli->query($sql);


 header('Location: ../index.php'); // index.php로 이동
?>