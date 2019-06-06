<script type='text/javascript' src='http://code.jquery.com/jquery-1.11.0.js'></script>

<script> 

$.fn.moleGame = function(options){

	return this.each(function(){
		var setter = {
			init : function(){
				$panel = $("#panel");
				$mole = $("#mole");
				$mole2 = $("#mole2");
				$mole3 = $("#mole3");
				$mole4 = $("#mole4");
				$mole5 = $("#mole5");
				$mole6 = $("#mole6");
				$play = $("#play");
				$scorePanel = $("#scorePanel > strong");
				w = $panel.width()-50;
				h = $panel.height()-50;
				nTimerID = 0;
				score = 0;
			},

			initEventListener : function(){
				$play.on("click", function(){
					$play.fadeOut(100);
					$play.addClass("btn_off");
					setter.gameStart();
					setter.clickMole();
				});
			},

			gameStart : function(){
				nTimerID = setInterval(function(){
					var x1 = parseInt(Math.random()*w);
					var y1 = parseInt(Math.random()*h);
					var x2 = parseInt(Math.random()*w);
					var y2 = parseInt(Math.random()*h);
					var x3 = parseInt(Math.random()*w);
					var y3 = parseInt(Math.random()*h);
					var x4 = parseInt(Math.random()*w);
					var y4 = parseInt(Math.random()*h);
					var x5 = parseInt(Math.random()*w);
					var y5 = parseInt(Math.random()*h);
					$mole.animate({
						"left":x1,
						"top":y1
					}
					);
					$mole2.animate({
						"left":x2,
						"top":y2
					}
					);
					$mole3.animate({
						"left":x3,
						"top":y3
					}
					);
					$mole4.animate({
						"left":x4,
						"top":y4
					}
					);
					$mole5.animate({
						"left":x5,
						"top":y5
					})
					$mole6.animate({
						"left":x4,
						"top":y4
					}
					);
				}, 50);

				setTimeout(function(){
					if(nTimerID != 0){
						clearInterval(nTimerID);
					}
					setter.clickMole();
					alert("게임종료 되었습니다. \n 점수는 " +score+"점 입니다.");
					score = 0 ;
					$mole.off("click");
					$play.removeClass("btn_off");
					$play.fadeIn(100);
				}, 10000);
				
			},

			clickMole : function(){
				$mole.on("click", function(){
					score += 1;
					$scorePanel.html(score);
				});
				$mole2.on("click", function(){
					score += 1;
					$scorePanel.html(score);
				});
				$mole3.on("click", function(){
					score += 1;
					$scorePanel.html(score);
				});
				$mole4.on("click", function(){
					score += 1;
					$scorePanel.html(score);
				});
				$mole5.on("click", function(){
					score += 1;
					$scorePanel.html(score);
				});
				$mole6.on("click", function(){
					score += 1;
					$scorePanel.html(score);
				});
				$scorePanel.html(score);
			}
		}
		setter.init();
		setter.initEventListener();

	});
}

$(function(){
	$("#moleGame").moleGame();
});
</script>