<?php
 session_start(); // 세션 시작
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

        .hover:hover {
            color:red;
        }

        #modal .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        #modal .modal-content {
            position:absolute;
            background-image: url('img/bg.jpg');
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            bottom: 3px;
            right: 10px;
            height: 350px;
            width: 350px;  /*Could be more or less, depending on screen size */
        }
        #play{
            margin: 3px;
        }
        #uchat:hover{
            color:red;
        }

    </style>
    
    <title>Over Clock</title>
</head>

<body class="bg-dark fg-white h-vh-100 m4-cloak">
    <aside class="sidebar pos-absolute z-2"
    data-role="sidebar"
    data-toggle="#sidebar-toggle-3"
    id="sb1"
    data-shift=".shifted-content">

        <div class="sidebar-header" data-image="img/oz.jpg">
            <a href="/" class="fg-black sub-action" onclick="Metro.sidebar.close('#sb1'); return false;">
                <span class="mif-arrow-left mif-2x" style="float:right;"></span>
            </a>
        </div>

        <ol class="sidebar-menu">
            <br>
            <!--로그인 시 로그아웃 버튼 보임-->
            <?php
            if(isset($_SESSION['userid'])){
            ?>

            <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="button dark" OnClick="location.href ='user/logout.php'">로그아웃</button>
                &nbsp;&nbsp;&nbsp;<button class="button dark" OnClick="location.href ='user/accountedit.php'">회원정보 수정</button></p>

            <?php 
            }else{
            ?>

            <li> &nbsp;&nbsp;&nbsp;<button class="button dark" OnClick="location.href ='user/login.php'">로그인</button></li>

            <?php
            }
            ?>

            <br>
            <li>&nbsp;&nbsp;&nbsp;※ 예매 시간 입력 </li>
            <input data-role="timepicker" id="setTime" data-distance="1">
            <br>

            <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" data-role="checkbox" id='autoconnect' >오픈 시간 자동 접속</li>
            <br>

            <li>&nbsp;&nbsp;&nbsp;※ 미리 알림 (음성) </li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" data-role="radio" data-style="2" name="radio" id="sound1" identifier="sound">5분전</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" data-role="radio" data-style="2" name="radio" id="sound2" identifier="sound">10분전</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" data-role="radio" data-style="2" name="radio" id="sound3" identifier="sound">30분전</li>

            <br>

            <li>&nbsp;&nbsp;&nbsp;※ 미리 알림 (이메일) </li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" data-role="radio" data-style="2" name="radio" id="email1" identifier="email">5분전</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" data-role="radio" data-style="2" name="radio" id="email2" identifier="email">10분전</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" data-role="radio" data-style="2" name="radio" id="email3" identifier="email">30분전</li>

            <br>

            <form method="POST" action="sendmail.php">
            <p><input type="text" data-role="input" placeholder="이메일" name="email"><button class="button dark" id="btnCheck">전송하기</button></p>
            
            </form>

            <audio src="" id="audio" autoplay></audio> <!-- 노래 부분 -->

            <br>
            <li> <a><button class="button dark" value="linkalarm">링크 알림 설정</button></a></li>
            <br>

        </ol>
    </aside>

    <!-- 로그인 했을때 우측 상단에 이름 나오는 부분 -->
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
             action="servertime/setURL.php"
             data-clear-invalid="2000"
             data-interactive-check="true"
             data-on-error-form="invalidForm"
             data-on-validate-form="validateForm">
                <span class='green_window' >
                    <input type='text' class='input_text' placeholder="사이트 링크" name="url">
                </span>
                
                <button type='submit' class='sch_smit'>검색</button>
            </form>
            
            <br>
            <br>
                
            <div class="clocks">
                <span class="hover text-center c-pointer" id="Date" OnClick="location.href ='#'"></span>
                
                <ul>
                    <li id="hours"></li>
                    <li id="point">:</li>
                    <li id="min"></li>
                    <li id="point">:</li>
                    <li id="sec"></li>
                </ul>
            </div>
        </div>

        <div class="tiles-area clear">
                
            <div class="tiles-grid tiles-group size-2 fg-white" data-size="wide"data-group-title="">
                
            
                <div data-role="tile" class="bg-red" data-size="large"><!-- <img src ="img/fire.png" width="300" height="250"> -->
                    <!--실시간 순위-->
                    <p class="text-center" id="rank1"></p>
                    <p class="text-center" id="rank2"></p>
                    <p class="text-center" id="rank3"></p>
                    <p class="text-center" id="rank4"></p>
                    <p class="text-center" id="rank5"></p>
                    <span class="branding-bar-hot" style="font-size:35px;">핫 존</span>
                </div>
            
            </div>

            <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="">

                <a href="/board_gnoo" data-role="tile" class="bg-violet fg-white"><img src ="img/consultation.png" width="120" height="120">
                     <span class="branding-bar">게시판</span>
                </a>
 
                <a  data-role="tile" id="modal_open" class="bg-olive fg-white"><img src ="img/watching-tv.png" value = "팝업창 호출" width="120" height="120">
                    <span class="branding-bar" >킬링타임</span>
                    <!--<button type="button" id="modal_open" img src ="img/watching-tv.png" onclick="open_pop" value = "팝업창 호출" width="120" height="120">모달 창 열기</button>-->
                </a>

                <div data-role="tile" class="bg-amber fg-white" onclick="window.open('game/ticket.html', '_blank', 'width=620px,height=550px,toolbars=no,scrollbars=no'); return false;"><img src ="img/ticket.png" width="120" height="120">
                         <span class="branding-bar">티켓팅 연습</span>
                         <span class="badge-bottom"></span>
                </div>
 
                <div data-role="tile" class="bg-cyan fg-white" data-effect="animate-slide-up">
                         <div class="slide"><img src ="img/oc.png" width="150" height="150"></div>
                         <div class="slide"><img src ="img/bus.png" width="150" height="150"></div>
                         <div class="slide"><img src ="img/ad.png" width="150" height="150"></div>
                </div>

                <div id="modal" style="display:none">
                    <div class="modal-content">

                        <a href = "http://www.youtube.com" align = "center" ><img id="play" src="img/youtube.png" width=" 100" height="100"></img></a>
                        <a href = "https://www.netflix.com/browse" align = "center"><img id="play" src="img/netflix.png" width=" 100" height="100"></img></a>
                        <a href = "https://www.twitch.tv/" align = "center" ><img id="play" src="img/twitch.png" width=" 100" height="100"></img></a>
                        <a href = "http://www.afreecatv.com/" align = "center" ><img id="play" src="img/afreeca.png" width=" 100" height="100"></img></a>
                        <a href = "https://play.sbs.co.kr/onair/pc/index.html" align = "center" ><img id="play" src="img/sbs.png" width=" 100" height="100"></img></a>
                        <a href = "http://onair.kbs.co.kr/" align = "center" ><img id="play" src="img/kbs.png" width=" 100" height="100"></img></a>

                    </div>
                </div>

            </div>
        </div>


    </center>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/metro.js"></script>
    <script src="index.js"></script> 

    <script type="text/javascript">
        //var url;
        var serverTime; // php로 헤더값 가져온 후 값 저장하는 변수
        var checkBoxCheck; // 오픈 시간 자동 접속 체크박스
        var sound1check; // 5분전 라디오 버튼(음성)
        var sound2check; // 10분전 라디오 버튼(음성)
        var sound3check; // 30분전 라디오 버튼(음성)
        var email1check; // 5분전 라디오 버튼(이메일)
        var email2check; // 10분전 라디오 버튼(이메일)
        var email3check; // 30분전 라디오 버튼(이메일)

        $(document).ready(function() {
            // 라디오 버튼(음성) 체크
            $("input[name=radio]").click(function() 
            { 
                radioCheck(); 
            })

            //  timepicker에서 30분전, 10분전, 5분전 설정 값 가져오기
            function radioCheck()
            {
                var sound1 = document.getElementById('sound1');
                var sound2 = document.getElementById('sound2');
                var sound3 = document.getElementById('sound3');
                var email1 = document.getElementById('email1');
                var email2 = document.getElementById('email2');
                var email3 = document.getElementById('email3');

                if($(sound1).is(":checked")) sound1check = true;
                    else sound1check = false;
                
                if($(sound2).is(":checked")) sound2check = true;
                    else sound2check = false;

                if($(sound3).is(":checked")) sound3check = true;
                    else sound3check = false;
                if($(email1).is(":checked")) email1check = true;
                    else email1check = false;
                
                if($(email2).is(":checked")) email2check = true;
                    else email2check = false;

                if($(email3).is(":checked")) email3check = true;
                    else email3check = false;
                
                return false; 
            }

            // 체크 박스 체크
            $("#autoconnect").change(function() 
            { 
                var autoconnect = document.getElementById('autoconnect');

                if($(autoconnect).is(":checked")) checkBoxCheck = true;
                else checkBoxCheck = false;
            })
        
            setInterval( function() {

                // 서버 시간 데이터 가져오기
                $.ajax({
                url: "servertime/HeaderInfo.php",
                type:"post",
                cache : false,
                success: function(data){ // HeaderInfo.php 파일에서 echo 결과값이 data
                        serverTime = data.split('\n');
                        //url = serverTime;

                        $('#Date').html(serverTime[3] + ":" + serverTime[4]);
                        $("#sec").html(( serverTime[2] < 10 ? "0" : "" ) + serverTime[2]);
                        $("#min").html(serverTime[1]);
                        $("#hours").html(( serverTime[0] < 10 ? "0" : "" ) + serverTime[0]);
                        $("#Date").attr( "OnClick", "location.href ='" + serverTime[3] + ":" + serverTime[4] + "'" );

                        checkBox(); // 체크 박스
                        radioButtonSound(); // 라디오 버튼(음성)
                        radisoButtonEmail(); // 라디오 버튼(이메일)

                    }
                });

                // 실시간 순위
                $.ajax({
                url: "rank/rankDB.php",
                type:"post",
                cache : false,
                success: function(data){ // rankDB.php 파일에서 echo 결과값이 data
                        var urlrank = data.split('\n');
                        if(urlrank[0] != ""){
                        $('#rank1').html(urlrank[0] + "   현재 1위 : " + urlrank[1]);
                        $('#rank2').html(urlrank[2] + "   현재 2위 : " + urlrank[3]);
                        $('#rank3').html(urlrank[4] + "   현재 3위 : " + urlrank[5]);
                        $('#rank4').html(urlrank[6] + "   현재 4위 : " + urlrank[7]);
                        $('#rank5').html(urlrank[8] + "   현재 5위 : " + urlrank[9]);
                        }
                        else $('#rank1').html("  \n\n\n\n\n 현재 데이터가 존재하지 않습니다. ");
                    }
                });

            },1000); // 1초 마다 데이터 가지고 옴

            setInterval( function() {

                // 실시간 검색 db 데이터 삭제
                $.ajax({
                url: "rank/rankDBdelete.php",
                cache : false,
                success: function(data){ // HeaderInfo.php 파일에서 echo 결과값이 data
                    }
                });

                },1000 * 60 * 10); // 10분마다 실시간 검색 테이블 데이터 삭제
        });

        // 모달
        $("#modal_open").click(function(){
            var str = $( "#modal" ).attr( "style" );
            if(str == "display:none"){
                $("#modal").attr("style", "display:block");
            }else{
                $("#modal").attr("style", "display:none");
            }
        });

        function checkBox(){
            // timepicker에서 설정한값과 서버시간이 맞으면 실행
            if(serverTime[0] + ":" + serverTime[1] + ":" + serverTime[2] == document.getElementById("setTime").value || 
                serverTime[0] + ":" + serverTime[1] + ":" + serverTime[2]== document.getElementById("setTime").value){

                if(checkBoxCheck){ // 체크박스가 체크되어 있으면 실행
                    window.open(serverTime[3] + ":" + serverTime[4] , '_blank'); 
                }
                
            }
        }
            // 라디오 버튼(사운드) 조건 주는 함수
            function radioButtonSound(){
                var setTime = document.getElementById("setTime").value;
                var setTimeSplit = setTime.split(':'); // setTime ":" 기준으로 스플릿
                var serverTimeHour = (serverTime[0] < 10 ? "0" : "" ) + serverTime[0]; // 서버시간 hour 자리수 맞추기
                var serverTimeSec = (serverTime[2] < 10 ? "0" : "" ) + serverTime[2]; // 서버시간 Sec 자리수 맞추기
                var setTimeHour;
                var setTimeMin;

                if(sound1check){ // 5분 전
                    if(setTimeSplit[1] - 5 < 0){
                        setTimeHour = setTimeSplit[0] - 1;
                        setTimeMin = 60 + (setTimeSplit[1] - 5);
                        // 연산 후 자리수가 달라져서 넣음
                        setTimeHour = (setTimeHour < 10 ? "0" : "") + setTimeHour;
                        setTimeMin = (setTimeMin < 10 ? "0" : "") + setTimeMin;
                    }
                    else{
                        setTimeHour = setTimeSplit[0];
                        setTimeMin = setTimeSplit[1] - 5;
                        // 연산 후 자리수가 달라져서 넣음
                        setTimeMin = (setTimeMin < 10 ? "0" : "") + setTimeMin;
                    }
                }

                if(sound2check){ // 10분 전
                    if(setTimeSplit[1] - 10 < 0){
                        setTimeHour = setTimeSplit[0] - 1;
                        setTimeMin = 60 + (setTimeSplit[1] - 10);
                        // 연산 후 자리수가 달라져서 넣음
                        setTimeHour = (setTimeHour < 10 ? "0" : "") + setTimeHour;
                        setTimeMin = (setTimeMin < 10 ? "0" : "") + setTimeMin;
                    }
                    else{
                        setTimeHour = setTimeSplit[0];
                        setTimeMin = setTimeSplit[1] - 10;
                        // 연산 후 자리수가 달라져서 넣음
                        setTimeMin = (setTimeMin < 10 ? "0" : "") + setTimeMin;
                    }
                }

                if(sound3check){ // 30분 전
                    if(setTimeSplit[1] - 30 < 0){
                        setTimeHour = setTimeSplit[0] - 1;
                        setTimeMin = 60 + (setTimeSplit[1] - 30);
                        // 연산 후 자리수가 달라져서 넣음
                        setTimeHour = (setTimeHour < 10 ? "0" : "") + setTimeHour;
                        setTimeMin = (setTimeMin < 10 ? "0" : "") + setTimeMin;
                    }
                    else{
                        setTimeHour = setTimeSplit[0];
                        setTimeMin = setTimeSplit[1] - 30;
                        // 연산 후 자리수가 달라져서 넣음
                        setTimeMin = (setTimeMin < 10 ? "0" : "") + setTimeMin;
                    }
                }

                if(serverTimeHour + ":" + serverTime[1] + ":" + serverTimeSec == setTimeHour + ":" + setTimeMin + ":" + setTimeSplit[2]){
                    $("#audio").attr( 'src', "audio/notice.mp3"); // 노래 재생
                }
                
            }

        function radisoButtonEmail(){
            var setTime = document.getElementById("setTime").value;
            var setTimeSplit = setTime.split(':'); // setTime ":" 기준으로 스플릿
            var serverTimeHour = (serverTime[0] < 10 ? "0" : "" ) + serverTime[0]; // 서버시간 hour 자리수 맞추기
            var serverTimeSec = (serverTime[2] < 10 ? "0" : "" ) + serverTime[2]; // 서버시간 Sec 자리수 맞추기
            var setTimeHour;
            var setTimeMin;

            if(email1check){ // 5분 전
                if(setTimeSplit[1] - 5 < 0){
                    setTimeHour = setTimeSplit[0] - 1;
                    setTimeMin = 60 + (setTimeSplit[1] - 5);
                    // 연산 후 자리수가 달라져서 넣음
                    setTimeHour = (setTimeHour < 10 ? "0" : "") + setTimeHour;
                    setTimeMin = (setTimeMin < 10 ? "0" : "") + setTimeMin;
                }
                else{
                    setTimeHour = setTimeSplit[0];
                    setTimeMin = setTimeSplit[1] - 5;
                    // 연산 후 자리수가 달라져서 넣음
                    setTimeMin = (setTimeMin < 10 ? "0" : "") + setTimeMin;
                }
            }

            if(email2check){ // 10분 전
                if(setTimeSplit[1] - 10 < 0){
                    setTimeHour = setTimeSplit[0] - 1;
                    setTimeMin = 60 + (setTimeSplit[1] - 10);
                    // 연산 후 자리수가 달라져서 넣음
                    setTimeHour = (setTimeHour < 10 ? "0" : "") + setTimeHour;
                    setTimeMin = (setTimeMin < 10 ? "0" : "") + setTimeMin;
                }
                else{
                    setTimeHour = setTimeSplit[0];
                    setTimeMin = setTimeSplit[1] - 10;
                    // 연산 후 자리수가 달라져서 넣음
                    setTimeMin = (setTimeMin < 10 ? "0" : "") + setTimeMin;
                }
            }

            if(email3check){ // 30분 전
                if(setTimeSplit[1] - 30 < 0){
                    setTimeHour = setTimeSplit[0] - 1;
                    setTimeMin = 60 + (setTimeSplit[1] - 30);
                    // 연산 후 자리수가 달라져서 넣음
                    setTimeHour = (setTimeHour < 10 ? "0" : "") + setTimeHour;
                    setTimeMin = (setTimeMin < 10 ? "0" : "") + setTimeMin;
                }
                else{
                    setTimeHour = setTimeSplit[0];
                    setTimeMin = setTimeSplit[1] - 30;
                    // 연산 후 자리수가 달라져서 넣음
                    setTimeMin = (setTimeMin < 10 ? "0" : "") + setTimeMin;
                }
            }

            if(serverTimeHour + ":" + serverTime[1] + ":" + serverTimeSec == setTimeHour + ":" + setTimeMin + ":" + setTimeSplit[2] ){
                window.open('sendmail.php', '_blank', 'width=620px,height=550px');
            }
            console.log(serverTimeHour + ":" + serverTime[1] + ":" + serverTimeSec);
            console.log(setTimeHour + ":" + setTimeMin + ":" + setTimeSplit[2]);
            
            
        }

    </script>
</body>
<footer>
  <!-- 유챗 새창으로 구현-->
    <a style="float:right;" id="uchat" class="mif-chat mif-5x c-pointer" onclick="window.open('uchat.html', '_blank', 'width=620px,height=550px'); return false;"></a>
</footer>
</html>