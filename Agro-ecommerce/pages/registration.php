<?php

$message = '';

if(isset($_POST['signUp'])){
    require_once'../class/font.php';
    $message = font::userRegistration();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='stylesheet' href='../css/style.css' type='text/css'>
	<link rel="stylesheet" href="..css/all.min.css">
	<title>User Registration</title>
</head>

<body>

	<?php include'header.php'; ?>

	<div class="login-page">
		<div class="form">
		<h3><?php echo $message?></h3>
			<form class="register-form" action="" method="POST">
				<h2>Registation Form</h2>
				<input type="text" name="name" placeholder="Name" required />
				<input type="text" name="email" placeholder="Email address" required />
				<input type="text" name="mobile" placeholder="Mobile" />
				<input type="password" name="password" placeholder="Password" required />
				<input type="password" name="confirmPassword" placeholder="Confirm Password" required />
				<button name="signUp" type="submit">create</button>
				<p class="message">Already registered? <a href="log_in.php">Sign In</a></p>
			</form>
		</div>
	</div>
</body>
</html>