<?php
if(!isset($_SESSION["login"])){
	$_SESSION['login'] = 0;	
}

if(isset($_POST['login'])){
	
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)
		or die('Error: missing string');
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)
	or die('Error: missing string');
	
	
	$sql="SELECT trainer_id, trainer_password FROM `trainer` WHERE trainer_username=?";
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $username);
	$stmt->bind_result($trainerid, $trainerpass);
	$stmt->execute();
	// printf("Error: %s.\n", $stmt->error);
	$stmt->store_result();
	$rows = $stmt->num_rows;
	while($stmt->fetch()){
		if($rows == 1){
			if(password_verify($password, $trainerpass)){
				$_SESSION['userid'] = $trainerid;
				$_SESSION['user'] = $username;	
				$_SESSION['login'] = 1;	
				$message = "Logged in";
			} else {
				$_SESSION['login'] = 0;	
				$message = "Not logged in";
			}
		}
	}
}
?>