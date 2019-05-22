<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <link href="index.css" rel="stylesheet">
    <link href="css/metro-all.css" rel="stylesheet">
    <style>
        

        body{
          background-image: url('img/bg.jpg');
          background-size: 1500px;
        }
        .green_window {
            display: inline-block;
            width: 366px; height: 34px;
            border: 3px solid #000000;
            background: white;
        }
        
        .sch_smit {
            width: 54px; height: 40px;
            margin: 0; border: 0;
            vertical-align: top;
            background: rgb(0, 0, 0);
            color: white;
            font-weight: bold;
            border-radius: 1px;
            cursor: pointer;
        }
        .sch_smit:hover {
            background: rgba(2, 7, 0, 0.171);
        }
    </style>
    
    <title>Over Clock</title>
</head>
<body class="bg-dark fg-white h-vh-100 m4-cloak">
        <aside class="sidebar pos-absolute z-2"
        data-role="sidebar"
        data-toggle="#sidebar-toggle-3"
        id="sb3"
        data-shift=".shifted-content">
     
     <ol class="sidebar-menu">
         <br>
         <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" data-role="checkbox"name='searchsave' value='searchsave' />검색시 주소 저장</li>
         <br>
         <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" data-role="checkbox"name='serverauto' value='serverauto' />오픈 시간 자동 접속</li>
         <br>
         <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" data-role="checkbox"name='kakao' value='kakao' />카카오톡 알림 받기</li>
         <br>
         <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" data-role="radio" data-style="2" name="chk_info" value="fm">5분전</li>
         <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" data-role="radio" data-style="2" name="chk_info" value="tm">10분전</li>
         <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" data-role="radio" data-style="2" name="chk_info" value="hfm">30분전</li>
         <br>
         <li> <a><button class="button dark" value="kakaologin">카카오 계정 로그인</button></a></li>
         <br>
         <?php
         if(isset($_SESSION['userid'])){
         ?>

         <li> <a href="user/logout.php" ><button class="button dark" value="login">로그아웃</button></a></li>

         <?php 
         }else{
         ?>

         <li> <a href="user/login.php" ><button class="button dark" value="login">로그인</button></a></li>

         <?php
         }
         ?>

         <br>
         <li> <a><button class="button dark" value="linkalarm">링크 알림 설정</button></a></li>
         <br>

     </ol>
 </aside>
 <div >
     <div class="app-bar pos-absolute bg-black z-1" data-role="appbar">
         <button class="app-bar-item c-pointer" id="sidebar-toggle-3">
             <span class="mif-menu fg-white"></span>
         </button>
         <span class="pos-fixed pos-top-right"><?php  if(isset($_SESSION['userid'])) echo $_SESSION['username']. "님 안녕하세요"; ?></span>
     </div>
 </div>
<center>
    
    <div class="container-fluid start-screen h-150">
        <form data-role="validator"
          method="POST"
          action="setURL.php"
          data-clear-invalid="2000"
          data-interactive-check="true"
          data-on-error-form="invalidForm"
          data-on-validate-form="validateForm">
            <span class='green_window' >
                <input type='text' class='input_text' placeholder="사이트 링크" name="url">
            </span>
                <button type='submit' class='sch_smit'>검색</button>
        </form>
        
        <div class="tiles-area clear">
            <br>

            <br>  
            </div>
            <div class="clocks">
                <div id="Date" OnClick="location.href ='#'"></div>
                  <ul>
                      <li id="hours"></li>
                      <li id="point">:</li>
                      <li id="min"></li>
                      <li id="point">:</li>
                      <li id="sec"></li>
                  </ul>
                </div>
           

            </div>
        </div>
    </div>

    <div class="tiles-area clear">
            
        <div class="tiles-grid tiles-group size-2 fg-white" data-size="wide"data-group-title="">
            
           
            <div data-role="tile" class="bg-red" data-size="large"><img src ="img/fire.png" width="300" height="250">
             
                <span class="branding-bar-hot" style="font-size:35px;">핫 존</span>
            </div>
         
        </div>

        <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="">

            <a href="https://naver.com" data-role="tile" class="bg-violet fg-white"><img src ="img/consultation.png" width="120" height="120">
                <span class="branding-bar">게시판</span>
            </a>
            <div data-role="tile" class="bg-olive fg-white"><img src ="img/watching-tv.png" width="120" height="120">
                <span class="branding-bar">킬링타임</span>
            </div>

            <div data-role="tile" class="bg-amber fg-white"><img src ="img/ticket.png" width="120" height="120">
                    <span class="branding-bar">티켓팅 연습</span>
                    <span class="badge-bottom"></span>
                </div>
            <div data-role="tile" class="bg-cyan fg-white" data-effect="animate-slide-up">
                    <div class="slide"><img src ="img/oc.png" width="150" height="150"></div>
                    <div class="slide"><img src ="img/bus.png" width="150" height="150"></div>
                    <div class="slide"><img src ="img/ad.png" width="150" height="150"></div>
        </div>
    </div>
</div>






</center>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/metro.js"></script>
    <script src="index.js"></script>
    
    <script href="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    

    <script type="text/javascript">
        $(document).ready(function() {

        setInterval( function() {
            
            // 데이터 가져오기
            $.ajax({
            url: "HeaderInfo.php",
            type:"post",
            cache : false,
            success: function(data){ // HeaderInfo.php 파일에서 echo 결과값이 data 임
                var jbSplit = data.split('\n');
                $("#sec").html(( jbSplit[2] < 10 ? "0" : "" ) + jbSplit[2]);
                $("#min").html(jbSplit[1]);
                $("#hours").html(( jbSplit[0] < 10 ? "0" : "" ) + jbSplit[0]);
                document.getElementById( 'Date' ).setAttribute( 'OnClick', "location.href ='" + jbSplit[3] + ":" + jbSplit[4] + "'" );
                $('#Date').html(jbSplit[3] + ":" + jbSplit[4]);
                }
            });

        },1000);
    });

    </script>
</body>
</html>