<?php

require_once '../class/font.php';
$message = '';

if (isset($_POST['signIn'])){
    
    $message = font::loginCheck();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='stylesheet' href='../css/style.css' type='text/css'>
	<title>User Log-In</title>
</head>

<body>

	<?php include'header.php'; ?>
	<div class="login-page">
		<div class="form">
			<form class="login-form" method="POST">
			<h4><?php echo $message?></h4>
                
				<h2>Log-In Form</h2>
				<input type="email"  name="email" placeholder="Email" />
				<input type="password" name="password" placeholder="Password" />
				<button  type="submit" name="signIn">login</button>
				<p class="message">Not registered? <a href="registration.php">Create an account</a></p>
			</form>
		</div>
	</div>
	

</body>
</html>