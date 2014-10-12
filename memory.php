<?php 
$board  = "";
$numbers1 = array();
$numbers2 = array();
for($i = 0; $i < 10; $i++){
	$found = false;
	while(!$found){
		$num = rand(1,10);
		if(!in_array($num,$numbers1)){
			$numbers1[$i] = $num;
			$found = true;
		}
	}
}
for($i = 0; $i < 10; $i++){
	$found = false;
	while(!$found){
		$num = rand(1,10);
		if(!in_array($num,$numbers2)){
			$numbers2[$i] = $num;
			$found = true;
		}
	}
}
$tiles = array();
$count = 0;
for($i = 0; $i < 20; $i++){
	$pick = rand(1,2);
	if($pick == 1){
		$tiles[$i] = $numbers1[$count];
		$i++;
		$tiles[$i] = $numbers2[$count];
	}else if($pick == 2){
		$tiles[$i] = $numbers2[$count];
		$i++;
		$tiles[$i] = $numbers1[$count];
	}
	$count++;
}
foreach($tiles as $num){
	$board .= "<div class='$num tile' onclick='checkCard(this)'><div class='cover'></div><span class='num'>$num</span></div>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Memory</title>
<script src='//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
<script src='memory.js'></script>
<link rel="stylesheet" type="text/css" href="memory.css">
</head>
<body>
<div id='wrapper'>
	<div id='header'><img src='../img/memory.png' height='100' alt='Memory'></div>
	<div id='board'>
		<?php echo $board; ?>
    </div>
    <div id='scoreboard'><span id='level'><span id='level-title'>Level</span><span id='level-count'>1</span></span><span id='xp'>0/500 xp</span><span id='moves'><span id='moves-title'>Moves</span><span id='moves-count'>0</span></span>
    <div id='first-move-badges' class='badge'><img src='first_move_badge.png' width='50'/><span id='first-move-badge-count' class='badge-count'>0</span></div>
    <div id='three-times-badges' class='badge'><img src='three_times_badge.png' width='50'/><span id='three-times-badge-count' class='badge-count'>0</span></div>
    </div>
</div>
<div class='game-message'></div>
<audio id='card-flip'><source src='aud/flip.mp3' type='audio/mpeg'></audio>
<audio id='card-match'><source src='aud/match.wav' type='audio/wav'></audio>
<audio id='level-up'><source src='aud/level_up.mp3' type='audio/mpeg'></audio>
<audio id='three-in-a-row'><source src='aud/three_in_a_row.mp3' type='audio/wav'></audio>
</body>
</html>
