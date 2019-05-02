<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link href="css/metro-all.css" rel="stylesheet">

    <title>Account</title>

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

    <form class="login-form bg-white p-6 mx-auto border bd-default win-shadow"
          data-role="validator"
          method="POST"
          action="accountSave.php"
          data-clear-invalid="2000"
          data-interactive-check="true"
          data-on-error-form="invalidForm"
          data-on-validate-form="validateForm">
        <span class="mif-user-plus mif-4x place-right" style="margin-top: -10px;"></span>

        <hr class="thin mt-4 mb-4 bg-white">
        <div class="form-group">
            <input type="text" data-role="input" data-prepend="<span class='mif-envelop'>" placeholder="이메일" data-validate="required email" name="id">
                <span class="invalid_feedback">이메일 형식으로 입력하세요</span>
        </div>
        <div class="form-group">
            <input type="text" data-role="input" data-prepend="<span class='mif-user'>" placeholder="이름" data-validate="required minlength=2" name="name">
                <span class="invalid_feedback">2자 이상 입력하세요</span>
        </div>
        <div class="form-group">
            <input type="password" id="password1" data-role="input" data-prepend="<span class='mif-key'>" placeholder="비밀번호" data-validate="required minlength=6" name="password">
                <span class="invalid_feedback">6자 이상 입력하세요</span>
        </div>
        <div class="form-group">
            <input type="password" id="password2" data-role="input" data-prepend="<span class='mif-lock'>" placeholder="비밀번호 확인" data-validate="required minlength=6">
            <div  style="color:#CE352C; font-size:14px" id="checkText"></div>
        </div>
        <div class="form-group">
            <input type="text" data-role="input" data-prepend="<span class='mif-school'>" placeholder="학번" data-validate="required minlength=7" name="dept_no">
            <span class="invalid_feedback">7자 이상 입력하세요</span>
        </div>
        <div class="form-group mt-10">
            <button class="button" id="btnCheck">가입하기</button>
            
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/metro.js"></script>
    
    <script>
        // 로그인 성공시 로그인필드가 사라짐
        function invalidForm(){
            var form  = $(this);
            form.addClass("ani-horizontal");
            setTimeout(function(){
                form.removeClass("ani-horizontal");
            }, 1000);
        }
        function validateForm(){
            $(".login-form").animate({
                opacity: 0;
            });
        }

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