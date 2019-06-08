<?php
 $mysqli = new mysqli("localhost", "root", "123456", "overclock");
 
 $id=$_POST['id'];
 $name=$_POST['name'];
 $password=$_POST['password'];
 $phoneNum=$_POST['phoneNum'];
 
 $sql = "insert into user_info (id, username, pwd, phoneNum)";
 $sql = $sql. "values('$id','$name','$password','$phoneNum')";

 if($mysqli->query($sql)){
    echo "<script>alert('회원가입 성공!!'); location.href='login.php';</script>";
 }else{
    echo "<script>alert('회원가입 실패ㅠㅠ'); location.href='login.php';</script>";
 }

 mysqli_close($mysqli);
?>