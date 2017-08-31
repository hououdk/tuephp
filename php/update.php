<?php 
	if(isset($_POST["update-type"])){
		$typeid = filter_input(INPUT_GET, 'tid', FILTER_VALIDATE_INT) or die('Error: missing poke id parameter');
		$typename = filter_input(INPUT_POST, 'tname', FILTER_SANITIZE_STRING) or die('Error: missing pokemon name');
		
		
		$sql = "UPDATE `type` SET type_name=? WHERE type_id=?";
		$stmt = $link->prepare($sql);
		$stmt->bind_param('si', $typename, $typeid);
		$stmt->execute();

		if ($stmt->errno) {
			echo "FAILURE!!! " . $stmt->error();
		}
		else {			
			if ($stmt->affected_rows >=1){
				$updated = 'Updated '.$stmt->affected_rows.' rows';
			}
			else{
				$updated = '';	
			}
		}
	}




	if(isset($_POST["update-pokemon"])){
		$pokeid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) or die('Error: missing poke id parameter');
		$pokename = filter_input(INPUT_POST, 'pokename', FILTER_SANITIZE_STRING) or die('Error: missing pokemon name');
		
		$pokeev = filter_input(INPUT_POST, 'pokeev', FILTER_VALIDATE_INT);
		if(empty($pokeev)){
			$pokeev= NULL;
		}
		else{}
		
		$poketype = filter_input(INPUT_POST, 'poketype', FILTER_VALIDATE_INT) or die('Error: missing pokemon type');
	
		$sql = 'UPDATE `pokemon` SET poke_name=?, poke_evolve=?, type_id=? WHERE poke_id=?';
		$stmt = $link->prepare($sql);
		$stmt->bind_param('siii', $pokename, $pokeev, $poketype, $pokeid);
		$stmt->execute();

		if ($stmt->errno) {
			echo "FAILURE!!! " . $stmt->error();
		}
		else {			
			if ($stmt->affected_rows >=1){
				$updated = 'Updated '.$stmt->affected_rows.' rows';
			}
			else{
				$updated = '';	
			}
		}
	}
?>