<?php
 $mysqli = new mysqli("localhost", "root", "123456", "overclock");
 
 $id=$_POST['id'];
 $name=$_POST['name'];
 $password=$_POST['password'];
 $dept_no=$_POST['dept_no'];
 
 $sql = "insert into user_info (id, name, pwd, dept_no)";
 $sql = $sql. "values('$id','$name','$password','$dept_no')";

 if($mysqli->query($sql)){
  echo 'success inserting';
 }else{
  echo 'fail to insert sql';
 }
?>