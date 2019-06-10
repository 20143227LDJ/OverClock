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
    <!--메트로 CSS를 사용하기 위한 부분-->

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

        #modal .modal {/*모달 지원 부분*/
            display: none; /*함수에서 바꿔주기 전에는 보이지 않음*/
            position: fixed;/*위치 값 고정*/
            z-index: 1; /*우선순위 첫 번째*/
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }

        #modal .modal-content {/*모달 창이 뜨면 보이는 부분*/
            position:absolute;
            background-image: url('img/bg.jpg');
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            bottom: 3px;
            right: 10px;
            height: 350px;
            width: 350px;
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

        <div class="sidebar-header" data-image="img/logo.PNG"><!--사이드 부분 상단에 로고가 나타난다.-->
            <a href="/" class="fg-black sub-action" onclick="Metro.sidebar.close('#sb1'); return false;">
                <span class="mif-arrow-left mif-2x" style="float:right;"></span>
            </a>
        </div>

        <ol class="sidebar-menu">
            <br>
            <!--로그인 세션값이 존재하면 로그아웃, 회원정보 수정 버튼 보여줌-->
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
            <li>&nbsp;&nbsp;&nbsp;※ 예매 시간 입력/사이트 접속시간 </li>
            <!--날짜와 시간값을 입력한 후 예약 메시지 보내기 버튼을 누르면 설정한 날짜와 시간값에 문자가 전송됨-->
            <form method="POST" action="coolSMS/sendSMS.php">
            <!--날짜 설정-->
            <input type="text" data-role="calendarpicker" id="setDate" data-input-format="%d%m%y" name="date">
            <!--시간 설정-->
            <input data-role="timepicker" id="setTime" data-distance="1" name="time">
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="button dark" value="linkalarm"data-role="hint"
            data-hint-text="설정한 시간에 예약 메시지가 전송됩니다"data-cls-hint="bg-gray fg-black drop-shadow">예약 메시지 보내기</button>
            </form>

            <br>

            <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" data-role="checkbox" id='autoconnect' >오픈 시간 자동 접속</li>
            <br>

            <li>&nbsp;&nbsp;&nbsp;※ 미리 알림 (음성) </li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" data-role="radio" data-style="2" name="radio" id="sound1" identifier="sound">5분전</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" data-role="radio" data-style="2" name="radio" id="sound2" identifier="sound">10분전</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" data-role="radio" data-style="2" name="radio" id="sound3" identifier="sound">30분전</li>

            <audio src="" id="audio"  autoplay></audio>

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
            <!--검색 버튼을 누르면 setURL.php에 POST방식으로 데이터를 전송한다. -->
            <form  method="POST" action="servertime/setURL.php">
                <span class='green_window' >
                    <input type='text' class='input_text' placeholder="사이트 링크(ex naver.com)" name="url">
                    <!--검색 값을 입력 받는 부분 http:// 를 적어주면 http:// 가 내부적으로 2번 들어가는 문제가 발생.
                        placeholder를 통해 사용자에게 안내-->
                </span>
                <button type='submit' class='sch_smit'>검색</button>
            </form>

            <br>
            <br>

            <!--자바스크립트로 서버시간 값을 받아서 출력하는 부분-->
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

                <div data-role="tile" class="bg-red" data-size="large">
                    <!--자바스크립트로 실시간 순위 값을 받아서 출력하는 부분-->
                    <p class="text-center" id="rank1"></p>
                    <p class="text-center" id="rank2"></p>
                    <p class="text-center" id="rank3"></p>
                    <p class="text-center" id="rank4"></p>
                    <p class="text-center" id="rank5"></p>
                    <span class="branding-bar-hot" style="font-size:35px;">핫 존</span>
                </div>

            </div>

            <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="">

                <a href="/board_gnoo" data-role="tile" class="bg-violet fg-white"
                onclick="window.open('http://tmdemr.dothome.co.kr', '_blank', 'width=620px,height=550px,toolbars=no,scrollbars=no'); return false;" >
                <img src ="img/consultation.png" width="120" height="120">
                    <span class="branding-bar">게시판</span><!-- XE로 게시판 기능을 추가한 웹 페이지를 팝업으로 띄워준다.-->
                </a>

                <a  data-role="tile" id="modal_open" class="bg-olive fg-white"><img src ="img/watching-tv.png" value = "팝업창 호출" width="120" height="120">
                    <span class="branding-bar" >킬링타임</span><!--id로 모달 오픈 함수를 받아온다.-->
                </a>

                <div data-role="tile" class="bg-amber fg-white" onclick="window.open('game/ticket.html', '_blank', 'width=620px,height=550px,toolbars=no,scrollbars=no'); return false;"><img src ="img/ticket.png" width="120" height="120">
                         <span class="branding-bar">티켓팅 연습</span><!-- 자바스크립트로 제작한 티켓팅 연습 게임을 연결하여 팝업으로 띄워준다.-->
                         <span class="badge-bottom"></span>
                </div>

                <div data-role="tile" class="bg-cyan fg-white" data-effect="animate-slide-up">
                         <div class="slide"><img src ="img/oc.png" width="150" height="150"></div>
                         <div class="slide"><img src ="img/bus.png" width="150" height="150"></div>
                         <div class="slide"><img src ="img/add.png" width="150" height="150"></div>
                </div>

                <div id="modal" style="display:none">
                    <div class="modal-content"><!--모달창이 뜨고 나서 내부적으로 보일 부분들-->

                        <a href = "http://www.youtube.com" align = "center" target="_blank" ><img id="play" src="img/youtube.png" width=" 100" height="100"></img></a>
                            <a href = "https://www.netflix.com/browse" align = "center" target="_blank"><img id="play" src="img/netflix.png" width=" 100" height="100"></img></a>
                            <a href = "https://www.twitch.tv/" align = "center"  target="_blank"><img id="play" src="img/twitch.png" width=" 100" height="100"></img></a>
                            <a href = "http://www.afreecatv.com/" align = "center" target="_blank" ><img id="play" src="img/afreeca.png" width=" 100" height="100"></img></a>
                            <a href = "https://play.sbs.co.kr/onair/pc/index.html" align = "center" target="_blank" ><img id="play" src="img/sbs.png" width=" 100" height="100"></img></a>
                            <a href = "http://onair.kbs.co.kr/" align = "center" target="_blank" ><img id="play" src="img/kbs.png" width=" 100" height="100"></img>
                            <!--유튜브, 넷플릭스 등 동영상 플랫폼을 새 탭에서 연결한다.-->
                        </a>

                    </div>
                </div>

            </div>
        </div>


    </center>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--JQuery 를 링크를 통해 받아오는 부분-->
    <script src="js/metro.js"></script>
    <!--메트로 UI를 사용하기 위한 스크립트 부분-->
    <script src="index.js"></script>

    <script type="text/javascript">
        var serverTime; // php로 헤더값 가져온 후 값 저장하는 변수
        var checkBoxCheck; // 오픈 시간 자동 접속 체크박스
        var sound1check; // 5분전 라디오 버튼(음성)
        var sound2check; // 10분전 라디오 버튼(음성)
        var sound3check; // 30분전 라디오 버튼(음성)

        $(document).ready(function() {

            // 라디오 버튼을 눌렀을 때 실행
            $("input[name=radio]").click(function()
            {
                radioCheck();
            })

            // 라디오 버튼을 눌렀을 때 실행하는 함수
            function radioCheck()
            {
                var sound1 = document.getElementById('sound1');
                var sound2 = document.getElementById('sound2');
                var sound3 = document.getElementById('sound3');
                var email1 = document.getElementById('email1');
                var email2 = document.getElementById('email2');
                var email3 = document.getElementById('email3');

                if($(sound1).is(":checked"))sound1check = true;
                else sound1check = false;

                if($(sound2).is(":checked")) sound2check = true;
                else sound2check = false;

                if($(sound3).is(":checked")) sound3check = true;
                else sound3check = false;

                return false;
            }

            // 오픈 시간 자동 접속 체크 박스가 체크했을 때와 체크 해제했을때 실행
            $("#autoconnect").change(function()
            {
                var autoconnect = document.getElementById('autoconnect');

                if($(autoconnect).is(":checked")) checkBoxCheck = true;
                else checkBoxCheck = false;
            })

            setInterval( function() {

                // HeaderInfo.php에서 echo 결과값을 받아온다
                $.ajax({
                url: "servertime/HeaderInfo.php",
                type:"post",
                cache : false,
                success: function(data){ // HeaderInfo.php 파일에서 echo 결과값이 data
                        serverTime = data.split('\n');

                        $('#Date').html(serverTime[3] + ":" + serverTime[4]);
                        $("#sec").html(( serverTime[2] < 10 ? "0" : "" ) + serverTime[2]);
                        $("#min").html(serverTime[1]);
                        $("#hours").html(( serverTime[0] < 10 ? "0" : "" ) + serverTime[0]);
                        $("#Date").attr( "OnClick", "location.href ='" + serverTime[3] + ":" + serverTime[4] + "'" );

                        checkBox(); // 체크 박스
                        radioButton(); // 라디오 버튼(음성)
                    }
                });

                // rankDB.php에서 echo 결과값을 받아온다
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

        });

            // 모달
            $("#modal_open").click(function(){
                var str = $( "#modal" ).attr( "style" );
                if(str == "display:none"){ // 모달 부분의 style에서 display가 none으로 설정되어 있으면
                    $("#modal").attr("style", "display:block"); // style의 display를 block으로 하여 보이게 한다.
                }else{
                    $("#modal").attr("style", "display:none"); //block으로 되어 있다면 none으로 바꾸어 안보이도록 한다.
                }
            });

            // 오픈시간 자동접속 기능을 위해 1초마다 값을 확인하기 위한 함수
            function checkBox(){
                // timepicker에서 설정한값과 서버시간이 맞으면 실행
                if(serverTime[0] + ":" + serverTime[1] + ":" + serverTime[2] == document.getElementById("setTime").value ){

                    if(checkBoxCheck){ // 체크박스가 체크되어 있으면 실행
                        window.open(serverTime[3] + ":" + serverTime[4] , '_blank');
                    }

                }
            }
            // 미리 알림(음성) 기능을 위해 1초마다 값을 확인하기 위한 함수
            function radioButton(){
                //  timepicker에서 30분전, 10분전, 5분전 설정 값 가져오기
                var setTime = document.getElementById("setTime").value;
                var setTimeSplit = setTime.split(':'); // setTime ":" 기준으로 스플릿
                var serverTimeHour = (serverTime[0] < 10 ? "0" : "" ) + serverTime[0]; // 서버시간 hour 자리수 맞추기
                var serverTimeSec = (serverTime[2] < 10 ? "0" : "" ) + serverTime[2]; // 서버시간 Sec 자리수 맞추기
                var setTimeHour;
                var setTimeMin;

                if(sound1check || email1check){ // 5분 전
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

                if(sound2check || email2check){ // 10분 전
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

                if(sound3check || email3check){ // 30분 전
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

    </script>
</body>
<footer>
  <!-- 유챗 새창으로 구현-->
    <a style="float:right;" id="uchat" class="mif-chat mif-5x c-pointer" onclick="window.open('uchat.html', '_blank', 'width=620px,height=550px'); return false;"></a>
    <!--우측 하단으로 이동 시키고, 클릭시에 팝업을 띄워 uchat.html 파일을 연결시켜준다.-->
</footer>
</html>
