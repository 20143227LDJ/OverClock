<?php
 session_start();

 $mysqli = new mysqli("localhost", "root", "123456", "overclock");


 $id=$_POST['id'];
 $password=$_POST['password'];

 $sql = "SELECT * FROM user_info WHERE id='$id' AND pwd='$password' ";

 $result = $mysqli->query($sql);

 $row = mysqli_fetch_assoc($result);
 if($row['id'] == $id && $row['pwd'] == $password) //db에서 id필드의 값과 pwd필드의 값을 각각 비교
 {
     $_SESSION['userid'] = $id;
     $_SESSION['username'] = $row['username'];
 }
 if(isset($_SESSION['userid']))
 {
    echo "<script>alert('로그인되었습니다.'); location.href='../index.php';</script>";
 }

 mysqli_close($mysqli);
?>