<?php
 $mysqli = new mysqli("localhost", "root", "123456", "overclock");
 
 $id=$_POST['id'];
 $name=$_POST['name'];
 $password=$_POST['password'];
 $phoneNum=$_POST['phoneNum'];
 

 $sql = "UPDATE user_info SET username = '$name', pwd = '$password', phoneNum = '$phoneNum' WHERE id = '$id'";

 if($mysqli->query($sql)){
    echo "<script>alert('회원정보 수정 성공!!'); location.href='../index.php';</script>";
 }else{
    echo "<script>alert('회원정보 수정 실패ㅠㅠ'); location.href='accountedit.php';</script>";
 }

 mysqli_close($mysqli);
?>