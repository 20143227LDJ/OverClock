<?php
	session_start();

	unset( $_SESSION['userid'] );

	echo "<script>alert('로그아웃되었습니다.'); location.href='../index.php';</script>";
?>