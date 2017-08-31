<?php
if(!isset($_SESSION["login"])){
	$_SESSION['login'] = 0;	
}

if(isset($_POST['login'])){
	
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)
		or die('Error: missing string');
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)
	or die('Error: missing string');
	
	
	$sql="SELECT trainer_id FROM `trainer` WHERE trainer_username=? and trainer_password=?";
	$stmt = $link->prepare($sql);
	$stmt->bind_param('ss', $username, $password);
	$stmt->bind_result($trainerid);
	$stmt->execute();
	$stmt->store_result();
	$rows = $stmt->num_rows;
	while($stmt->fetch()){
		
		if($rows == 1){
			$_SESSION['userid'] = $trainerid;
			$_SESSION['user'] = $username;	
			$_SESSION['login'] = 1;	
			$message = "Logged in";
		}
		
		else{
			$_SESSION['login'] = 0;	
			$message = "Not logged in";
		}
	}
}
?>