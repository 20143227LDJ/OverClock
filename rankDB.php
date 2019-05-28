<?php
 $mysqli = new mysqli("localhost", "root", "123456", "overclock");

 $sql = "select url, COUNT(url) from rankdb group by url order by COUNT(url) desc";

 $result = $mysqli->query($sql); // 쿼리 실행

 for($i = 0; $i < 5; $i++){
    $row = mysqli_fetch_assoc($result);
    echo $row['url']. "\n". $row['COUNT(url)']. "\n";
 }
 
 mysqli_close($mysqli);
?>