<?php 
	session_start();
	require_once 'php/config.php';
	include 'php/check-login.php';
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

	<h1>Login</h1>

        <form action="<? $_SERVER['PHP_SELF'] ?>" method="post" class="martop30">
        	<label>Username:</label>
        	<input type="text" name="username" />
            <label>Password:</label>
            <input type="password" name="password" />
            <p><?php if(isset($message)){ echo $message; } ?></p>
            <button type="submit" name="login">login</button>
            <a href="register.php"><p>Or register</p></a>
            
        </form>


</body>
</html>