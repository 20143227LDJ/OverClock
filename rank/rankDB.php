<?php
 $mysqli = new mysqli("localhost", "root", "123456", "overclock"); // MySQL와 연결

 $sql = "select url, COUNT(url) from rankdb group by url order by COUNT(url) desc"; // 쿼리문 선언(select문으로 데이터 개수를 내림차순으로 검색)

 $result = $mysqli->query($sql); // 쿼리문 실행

 for($i = 0; $i < 5; $i++){ // 순위 5위까지 출력하기 위해 반복문으로 5번 반복
    $row = mysqli_fetch_assoc($result); // 쿼리문 실행값을 배열로 변경(ex. $row['url'])
    echo $row['url']. "\n". $row['COUNT(url)']. "\n";
 }
 
 mysqli_close($mysqli);
?>