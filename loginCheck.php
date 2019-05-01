<?php
 session_start();

 $mysqli = new mysqli("localhost", "root", "123456", "account");


 $id=$_POST['id'];
 $password=$_POST['password'];

 $sql = "SELECT * FROM user_info WHERE id='$id' AND pwd='$password' ";

 $result = $mysqli->query($sql);

 $row = mysqli_fetch_array($result);
 if($row[0] == $id && $row[2] == $password)
 {
     $_SESSION['ses_id'] = $row[1];
     echo $_SESSION['ses_id'].'님 안녕하세요';
 }
//print_r(mysqli_fetch_array($result));
?>