<?php
 $mysqli = new mysqli("localhost", "root", "123456", "overclock"); // MySQL와 연결
 
 $id=$_POST['id']; // 사용자가 설정한 id 값을 받는다
 $name=$_POST['name']; // 사용자가 설정한 이름 값을 받는다
 $password=$_POST['password']; // 사용자가 설정한 비밀번호 값을 받는다
 $phoneNum=$_POST['phoneNum']; // 사용자가 설정한 전화번호 값을 받는다
 
 // 쿼리문 선언(update문으로 회원정보 수정)
 $sql = "UPDATE userinfo SET username = '$name', pwd = '$password', phoneNum = '$phoneNum' WHERE id = '$id'";

 if($mysqli->query($sql)){
    echo "<script>alert('회원정보 수정 성공!!'); location.href='../index.php';</script>"; // 메시지박스 출력 후 ../index.php이동
 }else{
    echo "<script>alert('회원정보 수정 실패ㅠㅠ'); location.href='accountedit.php';</script>"; // 메시지박스 출력 후 accountedit.php이동
 }

 mysqli_close($mysqli);
?>