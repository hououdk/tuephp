<?php 
	session_start();
	require_once 'php/config.php';
	include 'php/update.php';
	include 'php/delete.php';
	
	$typeid = filter_input(INPUT_GET, 'tid', FILTER_VALIDATE_INT) or die('Error: missing type id parameter');

	?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>Update type</title>
	<link  rel="stylesheet"  href="styles/stylesheet.css" type="text/css"/>

</head>

<body>
	<?php include 'usercontrols/header.php'; ?>

	<h1>Update type</h1>

	<div class="martop30">
   
		<form method="post" action="<? $_SERVER['PHP_SELF'] ?>" >
			<?php  
            
                $sql="SELECT type_name FROM `type` WHERE type_id=?";
                $stmt = $link->prepare($sql);
                $stmt->bind_param('i', $typeid);
                $stmt->bind_result($typename);
                $stmt->execute();
                while($stmt->fetch()){
                    echo 'type id: ' .$typeid;
                    echo '<input value="'.$typename.'" name="tname" type="text" required />'; 
                }
            ?>
        	<input type="submit" name="update-type" value="update" />
            <input type="submit" name="delete-type" value="delete" class="martop30" />
            
		</form>
        
        <?php 
			echo $updated;
		?>

    </div>    
</body>
</html>