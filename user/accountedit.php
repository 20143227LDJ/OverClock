<?php
 session_start(); // 세션 시작

 $mysqli = new mysqli("localhost", "root", "123456", "overclock");

 $id=$_SESSION['userid'];

 $sql = "SELECT * FROM userinfo WHERE id='$id'";
 $result = $mysqli->query($sql);
 $row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link href="../css/metro-all.css" rel="stylesheet">

    <title>Edit</title>

    <style>
        .login-form {
            width: 350px;
            height: auto;
            top: 50%;
            margin-top: -160px;
        }
    </style>
</head>
<body class="h-vh-100 bg-dark">
    <!--회원정보 수정에 필요한 정보 입력-->
    <form class="login-form bg-white p-6 mx-auto border bd-default win-shadow" method="POST" 
        data-role="validator" action="accounteditSave.php"
        data-clear-invalid="2000" data-on-error-form="invalidForm"
        data-on-validate-form="validateForm" data-interactive-check="true">
    
        <span class="mif-paste mif-4x place-right" style="margin-top: -10px;"></span>
        <hr class="thin mt-4 mb-4 bg-white">
        <div class="form-group">
            <!--text형식으로 input값 입력-->
            <input type="text" data-role="input" data-prepend="<span class='mif-envelop'>" placeholder="이메일" data-validate="required email" name="id" 
            value="<?php echo $row['id']; ?>" readonly>
                <span class="invalid_feedback">이메일 형식으로 입력하세요</span>
        </div>
        <div class="form-group">
            <input type="text" data-role="input" data-prepend="<span class='mif-user'>" placeholder="이름" data-validate="required minlength=2" name="name"
            value="<?php echo $row['username']; ?>">
                <span class="invalid_feedback">2자 이상 입력하세요</span>
        </div>
        <div class="form-group">
            <input type="password" id="password1" data-role="input" data-prepend="<span class='mif-key'>" placeholder="비밀번호" data-validate="required minlength=6" name="password"
            value="<?php echo $row['pwd']; ?>">
                <span class="invalid_feedback">6자 이상 입력하세요</span>
        </div>
        <div class="form-group">
            <input type="password" id="password2" data-role="input" data-prepend="<span class='mif-lock'>" placeholder="비밀번호 확인" data-validate="required minlength=6">
            <div  style="color:#CE352C; font-size:14px" id="checkText"></div>
        </div>
        <div class="form-group">
            <input type="text" data-role="input" data-prepend="<span class='mif-phone'>" placeholder="전화번호(01012345678)" data-validate="required minlength=7" name="phoneNum"
            value="<?php echo $row['phoneNum']; ?>">
            <span class="invalid_feedback">-빼고 입력하세요</span>
        </div>
        <div class="form-group mt-10">
            <button class="button" id="btnCheck">수정하기</button>
            
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/metro.js"></script>
    
    <script>

        // 비밀번호 확인
        window.onload = function(){
            var btnCheck = document.getElementById("btnCheck");
            btnCheck.onclick = function(){
                var pass1 = document.getElementById("password1");
                var pass2 = document.getElementById("password2");

                var pass1Value = pass1.value;
                var pass2Value = pass2.value;

                var checkText = document.getElementById("checkText");
                
                if(pass1Value == pass2Value){
                    checkText.innerHTML = "비밀번호 일치";
                }
                else{
                    checkText.innerHTML = "비밀번호 불일치";
                }
            }
        }
    </script>

</body>
</html>