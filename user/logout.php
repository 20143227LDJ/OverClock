<?php
	session_start();
	$res = session_destroy();
	if($res){
		echo "<script>alert('로그아웃되었습니다.'); location.href='../index.php';</script>";
	}
?>