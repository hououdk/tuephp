<?php 
	session_start();
	require_once 'php/config.php';
	include('php/register-user.php');
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

	<h1>Register</h1>

        <form action=" <? $_SERVER['PHP_SELF'] ?>" method="post" class="martop30">
        	<label>Trainer name:</label>
        	<input type="text" name="trainername"  required/>
        	<label>Username:</label>
        	<input type="text" name="username" required/>
            <label>Password:</label>
            <input type="password" name="password" required />

            <p><?php if(isset($message)){ echo $message; } ?></p>
            <button type="submit" name="register">register</button>
        </form>


</body>
</html>