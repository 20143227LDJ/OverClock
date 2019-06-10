<?php
 $mysqli = new mysqli("localhost", "root", "123456", "overclock");
 
 $id=$_POST['id']; // 사용자가 설정한 id 값을 받는다
 $name=$_POST['name']; // 사용자가 설정한 이름 값을 받는다
 $password=$_POST['password']; // 사용자가 설정한 비밀번호 값을 받는다
 $phoneNum=$_POST['phoneNum']; // 사용자가 설정한 전화번호 값을 받는다
 
 // 쿼리문 선언(insert문으로 회원정보 db에 저장)
 $sql = "insert into userinfo (id, username, pwd, phoneNum)";
 $sql = $sql. "values('$id','$name','$password','$phoneNum')";

 if($id=="" || $name="" || $password="" || $phoneNum=""){
   echo "<script>alert('회원가입 실패ㅠㅠ'); location.href='account.php';</script>"; // 메시지박스 출력 후 accountedit.php이동
 }else{
    $mysqli->query($sql);
    echo "<script>alert('회원가입 성공!!'); location.href='login.php';</script>";  // 메시지박스 출력 후 login.php이동
 }

 mysqli_close($mysqli);
?>