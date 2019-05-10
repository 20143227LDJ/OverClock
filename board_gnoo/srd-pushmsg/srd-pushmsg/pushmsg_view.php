<?php
/*
	프로그램 : srd_pushmsg 
	그누보드5의 알림서비스 플러그인
	ver . beta 0.1
	개발자 : salrido@korea.com
	그누보드 : rido
	개발일 : 2015 05 29
	- 세상만사 다 귀찮다 -_- 킁 먹고살기 힘들다.
	- 소스 수정 / 사용은 알아서들 하시고 재배포 및 소스포함시 저작권만 유지해주세요 
	- 수정시 수정사항을 메일로 피드백 해주시면 감사하겠습니다.
*/

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
// 스타일은 그누보드 알림에서 뽀려옴 -_-;;; 만들기 귀찮음

$query = "
	select count(*) as cnt from {$g5['g5_srd_pushmsg']}  
	where mb_id = '{$member['mb_id']}' and (msg_check != 'd' and msg_check = 'n') 
";

$result = sql_fetch ($query);

// 그누보드  익명닉네임  추가사항
if ($result['cnt'] > 1) $armbg = 'arm1';
elseif ($result['cnt'] == 0) $armbg = 'arm0';

$msg_count = $result['cnt'];
?>
                    <a href="<?php echo G5_PLUGIN_URL ?>/srd-pushmsg"><i class="fa fa-bell"></i> 알림 <span class="badge" id="arm_cnt"><?php echo $msg_count?></span></a>

