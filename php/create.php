<?php 

if(isset($_POST["create-type"])){

		$typename = filter_input(INPUT_POST, 'typename', FILTER_SANITIZE_STRING) or die('Error: missing type name');

		$sql = "INSERT INTO `type` (type_name) VALUES (?)";
		$stmt = $link->prepare($sql);
		$stmt->bind_param('s', $typename);
		$stmt->execute();
		
		echo 'inserted '.$stmt->affected_rows.' data rows';
}





if(isset($_POST["create-pokemon"])){
		
		$pokeid = filter_input(INPUT_POST, 'pokeid', FILTER_VALIDATE_INT)
		or die('Error: missing pokeid');
			
		$pokename = filter_input(INPUT_POST, 'pokename', FILTER_SANITIZE_STRING)
				or die('Error: missing  pokemon name');
		
		
		$pokeev = filter_input(INPUT_POST, 'pokeev', FILTER_VALIDATE_INT);
		if(empty($pokeev)){
			$pokeev= NULL;
		}		
				
		$typeid = filter_input(INPUT_POST, 'typeid', FILTER_VALIDATE_INT)
				or die('Error: missing type id');
		
		$sql = 'INSERT INTO `pokemon` (poke_id, poke_name, poke_evolve, type_id) VALUES (?,?,?,?)';
		$stmt = $link->prepare($sql);
		$stmt->bind_param('isii', $pokeid, $pokename, $pokeev, $typeid);
		$stmt->execute();
		
		echo 'inserted '.$stmt->affected_rows.' data rows';
	
	}
	
	


?>