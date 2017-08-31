<?php 

if(isset($_POST["catch"])){
	
	
	$sql="SELECT poke_id FROM pokemon";
	$stmt = $link->prepare($sql);
	$stmt->bind_result($pokeid);
	$stmt->execute();
	$stmt->store_result();
	$rows = $stmt->num_rows;


	/* Vi udvælger en random pokemon som vi kan fange*/
	$randompokemon = rand(1,$rows);
	
	/* vi genererer et random tal, som vi skal bruge til at vurdere, om pokemonen bliver fanget eller ej (50/50 procent chance) */
	$catch = rand(0,1);	
	
	
	
	if($catch == 1){
		$userid = $_SESSION["userid"];
		
		/* Vi fanger pokemonen hvis $catch = 1*/
		$sql = "INSERT INTO `trainer_has_pokemon` (trainer_id, poke_id) VALUES (?,?)";
		$stmt = $link->prepare($sql);
		$stmt->bind_param('ii', $_SESSION['userid'], $randompokemon);
		$stmt->execute();
		
		$message = "You got it! Gonna catch 'em all!";
		
	}
	
	else{
		/*Vi fanger ikke pokemonen */
		$message = "You can't catch 'em all, sorry.";
		
	}
		
}
		

?>