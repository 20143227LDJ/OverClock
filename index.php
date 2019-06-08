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

    </style>
    
    <title>Over Clock</title>
</head>

<body class="bg-dark fg-white h-vh-100 m4-cloak">
    <aside class="sidebar pos-absolute z-2"
    data-role="sidebar"
    data-toggle="#sidebar-toggle-3"
    id="sb1"
    data-shift=".shifted-content">
     
        <a href="/" class="fg-white sub-action" onclick="Metro.sidebar.close('#sb1'); return false;">
            <span class="mif-arrow-left mif-2x" style="float:right;"></span>
        </a>
        
        <ol class="sidebar-menu">
            <br>
            <br>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" data-role="checkbox"name='serverauto' value='serverauto' />오픈 시간 자동 접속</li>
            <br>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" data-role="checkbox"name='kakao' value='kakao' />카카오톡 알림 받기</li>
            <br>
            <li>&nbsp;&nbsp;&nbsp;※미리 알림 (음성,메시지) </li>
            
            <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" data-role="radio" data-style="2" name="chk_info" value="fm" id="radio1" checked>5분전</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" data-role="radio" data-style="2" name="chk_info" value="tm" id="radio2">10분전</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" data-role="radio" data-style="2" name="chk_info" value="hfm" id="radio3">30분전</li>

            <audio src="" id="audio" autoplay></audio> <!-- 노래 부분 -->

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

            <input data-role="timepicker" id="setTime"data-distance="1">

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
    
    <script href="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
    

    <script type="text/javascript">

        $(document).ready(function() {
            $("input:radio[type=radio]").click(function() 
            { 
                radioCheck(); 
            }) 
        

        setInterval( function() {

            // 데이터 가져오기
            $.ajax({
            url: "servertime/HeaderInfo.php",
            type:"post",
            cache : false,
            success: function(data){ // HeaderInfo.php 파일에서 echo 결과값이 data
                    var jbSplit = data.split('\n');

                    $('#Date').html(jbSplit[3] + ":" + jbSplit[4]);
                    $("#sec").html(( jbSplit[2] < 10 ? "0" : "" ) + jbSplit[2]);
                    $("#min").html(jbSplit[1]);
                    $("#hours").html(( jbSplit[0] < 10 ? "0" : "" ) + jbSplit[0]);
                    //document.getElementById( 'Date' ).setAttribute( 'OnClick', "location.href ='" + jbSplit[3] + ":" + jbSplit[4] + "'" );
                    $("#Date").attr( "OnClick", "location.href ='" + jbSplit[3] + ":" + jbSplit[4] + "'" );

                    // 시간 타이머
                    if(document.getElementById("setTime").value == jbSplit[0] + ":" + jbSplit[1] + ":" + jbSplit[2]){ // 사용자가 설정한 시간과 서버시간이 맞으면 조건문 실행
                        document.getElementById( 'audio' ).setAttribute( 'src', "audio/test.mp3"); // 노래 재생
                        
                        <?php
                            $to = $_SESSION['userid'];

                            $subject = "안녕하세요! OverClock입니다.";

                            $contents = "시간이 다 되었읍니다!!!\n";

                            $headers = "From: tovin4613@naver.com\r\n";

                            mail($to, $subject, $contents, $headers);
                        ?>
                    }
                }
            });

            // 실시간 순위
            $.ajax({
            url: "rank/rankDB.php",
            type:"post",
            cache : false,
            success: function(data){ // rankDB.php 파일에서 echo 결과값이 data
                    var jbSplit = data.split('\n');
                    if(jbSplit[0] != ""){
                    $('#rank1').html(jbSplit[0] + "   현재 1위 : " + jbSplit[1]);
                    $('#rank2').html(jbSplit[2] + "   현재 2위 : " + jbSplit[3]);
                    $('#rank3').html(jbSplit[4] + "   현재 3위 : " + jbSplit[5]);
                    $('#rank4').html(jbSplit[6] + "   현재 4위 : " + jbSplit[7]);
                    $('#rank5').html(jbSplit[8] + "   현재 5위 : " + jbSplit[9]);
                    }
                    else $('#rank1').html("  \n\n\n\n\n 현재 데이터가 존재하지 않습니다. ");
                }
            });

            // 시간 타이머

        },1000); // 1초 마다 데이터 가지고 옴

        setInterval( function() {

            // 실시간 검색 db 데이터 삭제
            $.ajax({
            url: "rank/rankDBdelete.php",
            cache : false,
            success: function(data){ // HeaderInfo.php 파일에서 echo 결과값이 data
                }
            });

        },1000 * 60 * 10);
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

    function radioCheck()	
    { 
        var radio1 = document.getElementById('radio1');
        var radio2 = document.getElementById('radio2');
        var radio3 = document.getElementById('radio3');

        if($(radio1).is(":checked")){
            alert("radio1");
        }

        if($(radio2).is(":checked")){
            alert("radio2");
        }

        if($(radio3).is(":checked")){
            alert("radio3");
        }
        return false; 
    }

    </script>
</body>
</html>