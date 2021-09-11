<?php
	
if (isset($_GET['status'])){
    require_once 'class/font.php';
    if ($_GET['status'] == 'logout'){
        $message = font::userLogout();
    }
}
?>
	
	<div>
		<header>
			<div class='top-nav'>
				<div class='wrapper'>

					<div class='main-nav'>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="pages/Contact_Us.php">Contact Us</a></li>
							<li><a href="pages/What_We_Do.php">What We Do</a></li>
							<li><a href="pages/carrer.php">Carer</a></li>
							<li><a href="pages/registration.php">Registration</a></li>
							<li><a href="pages/log_in.php">Log-In</a></li>
							<li><a href="card.php"><i class="fas fa-shopping-bag"></i></a></li>
							<li><a href="?status=logout"><i class="fas fa-sign-out-alt"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>

	</div>
	<div class='clr'>
	</div>
	</br>
	</br>
	</br>