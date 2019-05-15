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
        <div><span class='green_window'>
            <input type='text' class='input_text' placeholder="사이트 링크">
        </span>
        <button type='submit' class='sch_smit'>검색</button></div>
        
        <div class="tiles-area clear">
            <br>

            <br>  
            </div>
            <div class="clocks">
                <div id="Date"></div>
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
        // Create two variable with the names of the months and days in an array
        var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
        var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]
        
        // Create a newDate() object
        var newDate = new Date();
        // Extract the current date from Date object
        newDate.setDate(newDate.getDate());
        // Output the day, date, month and year   
        $('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
        
        setInterval( function() {
            // Create a newDate() object and extract the seconds of the current time on the visitor's
            var seconds = new Date().getSeconds();
            // Add a leading zero to seconds value
            $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
            },1000);
            
        setInterval( function() {
            // Create a newDate() object and extract the minutes of the current time on the visitor's
            var minutes = new Date().getMinutes();
            // Add a leading zero to the minutes value
            $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
            },1000);
            
        setInterval( function() {
            // Create a newDate() object and extract the hours of the current time on the visitor's
            var hours = new Date().getHours();
            // Add a leading zero to the hours value
            $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
            }, 1000);	
        });
        </script>

</body>
</html>