<?php 
	
if(isset($_POST["delete-type"])){
		$typeid = filter_input(INPUT_GET, 'tid', FILTER_VALIDATE_INT) or die('Error: missing type id parameter');
		
		$sql = "DELETE FROM `type` WHERE type_id=?";
		$stmt = $link->prepare($sql);
		$stmt->bind_param('i', $typeid);
		$stmt->execute();
		
		header("Location: index.php ");
}


	
if(isset($_POST["delete-pokemon"])){
		$pokeid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) or die('Error: missing poke id parameter');
				
		$sql = "DELETE FROM `pokemon` WHERE poke_id=?";
		$stmt = $link->prepare($sql);
		$stmt->bind_param('i', $pokeid);
		$stmt->execute();
		
		header("Location: index.php ");
}


?>