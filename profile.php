<?php 
	session_start();
	require_once 'php/config.php';
	include 'php/catch.php';

		
	/* Hvis ikke vi er logget ind, bliver vi redirected til login.php */	
	if($_SESSION["login"] == 1){
		
	}
	else{
		header('Location: login.php');	
	}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>Pokémon!</title>
	<link  rel="stylesheet"  href="styles/stylesheet.css" type="text/css"/>

</head>

<body>
	<?php include 'usercontrols/header.php'; ?>

	<h1>Profile</h1>

	<div class="martop30">
		<?php  
            $sql="SELECT trainer_name FROM `trainer` where trainer_username='".$_SESSION['user']."'";
            $stmt = $link->prepare($sql);
            $stmt->bind_result($trainername);
            $stmt->execute();
            while($stmt->fetch()){
				echo '<span>Name:</span>';
				echo $trainername;
				echo '<br/>';
				echo '<span>Username:</span>';
				echo $_SESSION['user'];
            }
        ?>
        
     
    </div>
    
    <div class="martop60">
    	<h2>Catch a pokémon</h2>
        
        
        /* Catch a pokemon formen. Koden bag dette ligger i php/catch.php, som vi har inkluderet øverst på siden. */
		<form action="<? $_SERVER['PHP_SELF'] ?>" method="post">
        	<input type="submit" name="catch" value="catch a pokémon!" />
        </form>
        
        <?php 
			if($message){ echo $message; }
		
		?>
        
    </div>
    
    
    <div class="martop60">

        <h2>Users pokémon</h2>
        
        
        <!-- En liste af de pokémons vi har fanget. Vi vil gerne have vist poke_id, poke_name og type_name for den enkelte pokemon. Dem vil vi gerne have vist, for den bruger der er online. Brugernavnet er gemt i session $_SESSION['user']. Herudover definerer vi til sidst hvad vores foreignkeys er lig med. */-->
        <?php  
            $sql="SELECT t2.poke_id, t2.poke_name, t3.type_name FROM `trainer_has_pokemon` t1, `pokemon` t2, `type` t3, `trainer` t4 where t4.trainer_username='".$_SESSION['user']."' and t1.trainer_id= t4.trainer_id and t1.poke_id = t2.poke_id and t3.type_id = t2.type_id";
            $stmt = $link->prepare($sql);
            $stmt->bind_result($pokeid, $pokename, $typename);
            $stmt->execute();
            while($stmt->fetch()){
				echo '
					<div>
							<p>
							Id: '.$pokeid.'
							Name: '.$pokename.'
							Type: '.$typename.'
							</p>
					</div>
				
				';
            }
        ?>
    </div>


</body>
</html>