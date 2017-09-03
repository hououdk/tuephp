<?php 
	session_start();
	require_once 'php/config.php';
	include 'php/create.php';
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Create Type</title>
    <link rel="stylesheet"  href="styles/stylesheet.css" type="text/css"/>
</head>

<body>
	<?php include 'usercontrols/header.php'; ?>


	<h1>Create Type</h1>

	<form method="post" action="<? $_SERVER['PHP_SELF'] ?>">
    	<input placeholder="type name" name="typename" type="text" required/>
        <input type="submit" name="create-type" value="submit" />
    </form>

</body>
</html>