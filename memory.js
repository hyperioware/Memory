// JavaScript Document
var card1 = null;
var card2 = null;
var count = 0;
var moves = 0;
var lvl_1 = 50,lvl_2 = 40,lvl_3 = 30,lvl_4 = 20, lvl_5 = 10;
var lvl2_xp = 500,lvl3_xp = 2000,lvl4_xp = 10000,lvl5_xp = 50000;
var max_moves = lvl_1;
var level = 1;
var xp = 0;
var three_in_a_row = 0;
function checkCard(el){
	if($(el).hasClass('matched')){
	}else{
		if(card1){
			moves++;
			$("#moves").html(moves);
			card2 = el;
			$(card2).addClass('selected');
			$('.selected .cover').hide();
			$('.selected .num').show();
			setTimeout(function(){
				if($(card1).attr('class') == $(card2).attr('class')){
					if(three_in_a_row == 3){
						alert("Matched 3 in a row!");
						giveBonus("three_in_a_row");
						three_in_a_row = 0;
					}else{
						three_in_a_row++;
					}
					if(moves == 1){
						alert("First move match bonus!");
						giveBonus("first_move_match");
					}
					$('.tile').removeClass('selected');
					$(card1).addClass('matched');
					$(card2).addClass('matched');
					card1 = null;
					card2 = null;
					count += 2;
					if(count == 20){
						$('.matched .cover').show();
						$('.matched .num').hide();
						$('.tile').removeClass('matched');
						endTurn();
						count = 0;
						moves = 0;
						$("#moves").html("Number of moves: "+moves);
						$.ajax({
							type: 'post',
							url: 'post.php',
							data: {request:'get_board'},
							dataType: 'json',
							success: function(response){
								$("#board").html(response.board);
								$("#level").html("Level "+level);
								$("#xp").html("XP: "+xp);
							}
						});
					}
				}else{
					$('.selected .num').hide();
					$('.selected .cover').show();
					$('.tile').removeClass('selected');
					card1 = null;
					card2 = null;
					three_in_a_row = 0;
				}
				
			},200);
			
		}else{
			card1 = el;
			$(card1).addClass('selected');
			$('.selected .cover').hide();
			$('.selected .num').show();
		}
		
	}
}

function endTurn(){
	if(level == 1 && moves < lvl_1){
		var remainder = lvl_1 - moves;
		var percent = parseInt("" + ((remainder/lvl_1) * 100));
		xp += percent * 10;
		if(xp >= lvl2_xp){
			level = 2;
		}
	}else if(level == 2 && moves < lvl_2){
		var remainder = lvl_2 - moves;
		var percent = parseInt("" + ((remainder/lvl_2) * 100));
		xp += percent * 10;
		if(xp >= lvl3_xp){
			level = 3;
		}
	}else if(level == 3 && moves < lvl_3){
		var remainder = lvl_3 - moves;
		var percent = parseInt("" + ((remainder/lvl_3) * 100));
		xp += percent * 50;
		if(xp >= lvl4_xp){
			level = 4;
		}
	}else if(level == 4 && moves < lvl_4){
		var remainder = lvl_4 - moves;
		var percent = parseInt("" + ((remainder/lvl_4) * 100));
		xp += percent * 50;
		if(xp >= lvl5_xp){
			level = 5;
		}
	}else if(level == 5 && moves < lvl_5){
		var remainder = lvl_5 - moves;
		var percent = parseInt("" + ((remainder/lvl_5) * 100));
		xp += percent * 100;
	}
}

function giveBonus(type){
	switch(type){
		case "first_move_match": xp += 100;break;
		case "three_in_a_row": xp += 500;break;
	}
	$("#xp").html("XP: "+xp);
}