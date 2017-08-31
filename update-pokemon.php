<?php 
	session_start();
	require_once 'php/config.php';
	include 'php/update.php';
	include 'php/delete.php';
	
	$pokeid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) or die('Error: missing poke id parameter');
	
	
	/* forbereder statement til senere brug*/
	$sql2="SELECT type_id, type_name FROM `type` ";
	$stmt2 = $link->prepare($sql2);
	$stmt2->execute();
	$stmt2->bind_result($typeid, $typename);
	$stmt2->store_result();

	?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>Update pokemon</title>
	<link  rel="stylesheet"  href="styles/stylesheet.css" type="text/css"/>

</head>

<body>
	<?php include 'usercontrols/header.php'; ?>

	<h1>Update pokemon</h1>

	<div class="martop30">
   
		<form method="post" action="<? $_SERVER['PHP_SELF'] ?>" >
		<?php  
		
            $sql="SELECT poke_name, poke_evolve, p.type_id, type_name FROM `pokemon` p, `type` t WHERE p.type_id=t.type_id AND p.poke_id=?";
      		$stmt = $link->prepare($sql);
			$stmt->bind_param('i', $pokeid);
			$stmt->bind_result($pokename, $pokeev, $poke_typeid, $poke_typename);
			$stmt->execute();
			while($stmt->fetch()){
				echo 'pokemon id: ' .$pokeid;
				echo '
					<input value="'.$pokeid.'" name="pokeid" type="number" required disabled />
					<input value="'.$pokename.'" name="pokename" type="text" required /> 
					<input value="'.$pokeev.'" name="pokeev" type="number" />';
					
					echo '<select name="poketype">';
						
						while($stmt2->fetch()){
							echo '<option value="'.$typeid.'" '; if($poke_typeid==$typeid){echo 'selected';}   echo '>';
								echo $typename;	
							echo '</option>';
						}
					echo '</select>';		
			}

		?>
        
        	<input type="submit" name="update-pokemon" value="update" />
            <input type="submit" name="delete-pokemon" value="delete" class="martop30" />
		</form>
        
        <?php 
			echo $updated;
		?>

    
    </div>
     
    
</body>
</html>