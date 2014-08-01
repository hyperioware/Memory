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
for($i = 10; $i < 20; $i++){
	$found = false;
	while(!$found){
		$num = rand(1,10);
		if(!in_array($num,$numbers2)){
			$numbers2[$i] = $num;
			$found = true;
		}
	}
}
foreach($numbers1 as $num){
	$board .= "<div class='$num tile' onclick='checkCard(this)'><div class='cover'></div><span class='num'>$num</span></div>";
}
foreach($numbers2 as $num){
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
    <div id='scoreboard'><span id='level'><span id='level-title'>Level</span><span id='level-count'>1</span></span><span id='xp'>0/500 xp</span><span id='moves'><span id='moves-title'>Moves</span><span id='moves-count'>0</span></span></div>
</div>
<div class='game-message'></div>
</body>
</html>
