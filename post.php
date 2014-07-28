<?php
if(isset($_POST['request'])){
	if($_POST['request'] === 'get_board'){
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
		echo json_encode(array('board' => $board));
	}
}
?>