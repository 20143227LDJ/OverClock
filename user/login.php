<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link href="../css/metro-all.css" rel="stylesheet">
    <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>

    <title>Login</title>

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
    <!--로그인에 필요한 정보 입력-->
    <form class="login-form bg-white p-6 mx-auto border bd-default win-shadow" method="POST" 
                data-role="validator" action="loginCheck.php"
                data-clear-invalid="2000" data-on-error-form="invalidForm"
                data-on-validate-form="validateForm" data-interactive-check="true">
        <span class="mif-vpn-lock mif-4x place-right" style="margin-top: -10px;"></span>

        <hr class="thin mt-4 mb-4 bg-white">
        <div class="form-group">
            <!--text형식으로 input값 입력-->
            <input type="text" data-role="input" data-prepend="<span class='mif-envelop'>" placeholder="이메일" data-validate="required email" name="id">
        </div>
        <div class="form-group">
            <input type="password" data-role="input" data-prepend="<span class='mif-key'>" placeholder="비밀번호" data-validate="required minlength=6" name="password">
        </div>
        <div class="form-group mt-10">
            <button class="button">로그인</button>
            <a class="button place-right" href="account.php" role="button">회원가입</a>

        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/metro.js"></script>
    

    <script>
        function invalidForm(){
            var form  = $(this);
            form.addClass("ani-horizontal");
            setTimeout(function(){
                form.removeClass("ani-horizontal");
            }, 1000);
        }
    </script>

</body>
</html>