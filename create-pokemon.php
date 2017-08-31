<?php 
	session_start();
	require_once 'php/config.php';
	include 'php/create.php';

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Create Pokemon</title>
    <link rel="stylesheet"  href="styles/stylesheet.css" type="text/css"/>
</head>

<body>
	<?php include 'usercontrols/header.php'; ?>


	<h1>Create Pokemon</h1>

	<form method="post" action="<? $_SERVER['PHP_SELF'] ?>">
    	<input placeholder="Pokemon id" name="pokeid" type="number" required/>
    	<input placeholder="Pokemon name" name="pokename" type="text" required/> 
        <input placeholder="Pokemon can be evolved to poke id" name="pokeev" type="number" />
		<select name="typeid" required>
        	<option disabled selected> -- select type --</option>
        
        <?php  
            $sql="SELECT type_id, type_name FROM type";
            $stmt = $link->prepare($sql);
            $stmt->bind_result($typeid, $typename);
            $stmt->execute();
            while($stmt->fetch()){
                echo '<option value="'.$typeid.'">';
					echo $typename;	
				echo '</option>';
            }
        ?>
	
        </select>
        <input type="submit" name="create-pokemon" value="submit" />
        
    </form>

</body>
</html>