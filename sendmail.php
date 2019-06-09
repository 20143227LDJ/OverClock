<?php
    session_start(); // 세션 시작
    $email=$_POST['email'];

        // 메일 보내기
        if($_SESSION['userid']){
            $to = $_SESSION['userid'];
            $subject = "안녕하세요! OverClock입니다.";
            $contents = "시간이 다 되었습니다!!!\n";
            $headers = "From: tovin4613@naver.com\r\n";
        }else{
            $to = $email;
            $subject = "안녕하세요! OverClock입니다.";
            $contents = "시간이 다 되었습니다!!!\n";
            $headers = "From: tovin4613@naver.com\r\n";
        }
       
        if(mail($to, $subject, $contents, $headers)){
            if($_SESSION['userid']){
                echo "<script>alert('메일 전송 성공!!'); self.close();</script>";
            }else{
                echo "<script>alert('메일 전송 성공!!'); location.href='index.php';</script>";
            }
            
        }else{
            if($_SESSION['userid']){
                echo "<script>alert('메일 전송 실패ㅠㅠ'); self.close();</script>";
            }else{
                echo "<script>alert('메일 전송 실패ㅠㅠ'); location.href='index.php';</script>";
            }
        }
    
?>