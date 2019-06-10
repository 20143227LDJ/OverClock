<?php
 session_start();

 $mysqli = new mysqli("localhost", "root", "123456", "overclock"); // MySQL와 연결


 $id=$_POST['id']; // 사용자가 설정한 id 값을 받는다
 $password=$_POST['password']; // 사용자가 설정한 비밀번호 값을 받는다

 // 쿼리문 선언(select문으로 아이디값과 비밀번호값 비교하여 검색)
 $sql = "SELECT * FROM userinfo WHERE id='$id' AND pwd='$password' ";

 $result = $mysqli->query($sql); // 쿼리문 실행

 $row = mysqli_fetch_assoc($result); // 쿼리문 실행값을 배열로 변경(ex. $row['userid'])
 if($row['id'] == $id && $row['pwd'] == $password) //db에서 id필드의 값과 pwd필드의 값을 각각 비교
 {
     $_SESSION['userid'] = $id; // 아이디를 세션으로 만듬
     $_SESSION['username'] = $row['username']; // 이름을 세션으로 만듬
 }
 if(isset($_SESSION['userid']))
 {
    echo "<script>alert('로그인되었습니다.'); location.href='../index.php';</script>"; // 메시지박스 출력 후 ../index.php이동
 }

 mysqli_close($mysqli);
?>