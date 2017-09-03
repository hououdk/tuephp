<?php
if(isset($_POST["register"])){

	$trainername = filter_input(INPUT_POST, 'trainername', FILTER_SANITIZE_STRING) or die('Error: missing type name');
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING) or die('Error: missing type name');
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING) or die('Error: missing type name');
	$password = password_hash($password, PASSWORD_DEFAULT);

	$sql="SELECT trainer_name FROM `trainer` WHERE trainer_username=?";
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $username);
	$stmt->bind_result($tnam);
	$stmt->execute();
	$stmt->store_result();
	$rows = $stmt->num_rows;
	
	if($stmt->num_rows == 1){
		$message = $username. ' eksisterer allerede, og blev ikke oprettet.';
	}
	
	else if($rows == 0) {
		$sql2 = "INSERT INTO `trainer` (trainer_name, trainer_username, trainer_password) VALUES (?,?,?)";
		$stmt2 = $link->prepare($sql2);
		$stmt2->bind_param('sss', $trainername, $username, $password);
		$stmt2->execute();
		$message = $username. ' er blevet oprettet.';
	}
		
	else{
		$message = $username. ' blev ikke oprettet.';
	}

}
	
?>
