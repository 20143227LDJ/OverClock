<?php
 $mysqli = new mysqli("localhost", "root", "123456", "overclock");

 $sql = "delete from rankdb";

 $result = $mysqli->query($sql); // 쿼리 실행
 
 mysqli_close($mysqli);
?>