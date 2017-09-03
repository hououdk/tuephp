<?php 
	session_start();
	require_once 'php/config.php';
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

	<h1>All Pokemons</h1>

	<div class="martop30">
		<?php  
            $sql="SELECT poke_id, poke_name FROM pokemon";
            $stmt = $link->prepare($sql);
            $stmt->bind_result($pokeid, $pokename);
            $stmt->execute();
            while($stmt->fetch()){
				
                echo '<div>';
                    echo '<a href="update-pokemon.php?id='.$pokeid.'" target="_blank">';
                        echo $pokename;
                    echo '</a>';
                echo '</div>';
            }
        ?>
        
        <form action="create-pokemon.php" method="post" class="martop30">
            <button type="submit" name="new-pokemon">create new pokemon</button>
        </form>
    
    </div>
    
    

    <!-- copy /paste ovenover -->
    
    <div class="martop60">
    
    <h1>All types</h1>

    <?php  
		$sql="SELECT type_id, type_name FROM type";
		$stmt = $link->prepare($sql);
		$stmt->bind_result($typeid, $typename);
		$stmt->execute();
		while($stmt->fetch()){
			echo '<div>';
				echo '<a href="update-type.php?tid='.$typeid. '">';
					echo $typename;
				echo '</a>';
			echo '</div>';
		}
	?>
   
    <form action="create-type.php" method="post" class="martop30">
    	<button type="submit" name="new-type">create new type</button>
        
    </form>
    
    </div>

</body>
</html>