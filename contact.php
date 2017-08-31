<?php
session_start();

if(isset($_POST['sendmail'])){
	
	$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING) or die('missing name');
	$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) or die('missing e-mail');
	$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING) or die('missing message');
	

	$to = 'pia@multi-media.dk';
	$subject = 'workshop';
	$headers = "From: multi-media.dk <'" .$email. "'>\r\n";
	$headers .=  'Reply-To: ' . $email . "\r\n";
	$headers .= "X-Mailer: PHP's mail() Function\r\n";
	$headers .= "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-Type: text/html; charset=utf-8\r\n";
	
	$authenticate = null;

	$message= $name. ' has contacted you through the website with following message: ' ."\n\n". '  '.$message.' '."\n\n".' '.$name.'s known information is: ' ."\n". 'email: '.$email;
	$mailsent = mail($to, $subject, $message, $headers, $authenticate);

}
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <title>Contact</title>
    <link  rel="stylesheet"  href="styles/stylesheet.css" type="text/css"/>
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.60/jquery.form-validator.min.js"></script>

    <script type="text/javascript">
		
		$(document).ready(function(){
			var myLanguage = {
				badEmail : 'Oooops - this is not a correct mail address!',
			}
			$.validate({
				language : myLanguage
				});
		});

	</script>
</head>

<body>
	<?php include 'usercontrols/header.php'; ?>
    
    <h1>Contact form</h1>
	<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" class="martop30">
    	<label>Name *</label><input name="name"  type="text" placeholder="Name" data-validation="required"/>
    	<label>E-mail *</label><input name="email" type="email" placeholder="e-mail" data-validation="email"/>
        <label>Message *</label><textarea name="message" placeholder="message" data-validation="required"></textarea>
        <input type="submit" name="sendmail" value="send" />
    </form>
    
    <?php 
		if(isset($_POST["sendmail"])){
			echo 'mail sent';
		}
	?>

</body>
</html>