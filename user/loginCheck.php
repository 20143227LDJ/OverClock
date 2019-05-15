<?php
 session_start();

 $mysqli = new mysqli("localhost", "root", "123456", "overclock");


 $id=$_POST['id'];
 $password=$_POST['password'];

 $sql = "SELECT * FROM user_info WHERE id='$id' AND pwd='$password' ";

 $result = $mysqli->query($sql);

 $row = mysqli_fetch_array($result);
 if($row[0] == $id && $row[2] == $password)
 {
     $_SESSION['userid'] = $id;
     $_SESSION['username'] = $row[1];
 }
 if(isset($_SESSION['userid']))
 {
    echo "<script>alert('로그인되었습니다.'); location.href='../index.php';</script>";
 }
//print_r(mysqli_fetch_array($result));
?>