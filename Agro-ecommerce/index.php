<?php
require_once 'class/font.php';

$topProduct = font::allActiveProduct();

$fishItems = font::fishItem();

$allVegetablesItems = font::vagetItem();

$poultryItems = font::poultryItems();

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="favicon.ico" sizes="16x16" type="image">
	<link rel='stylesheet' href='css/style.css' type='text/css'>
	<link rel="stylesheet" href="css/all.min.css">

	<title>Agro Shope</title>
</head>

<body>
	<?php include'header.php';?>

	<div>
		<div class='nav-slider main'>

			<div class='nav-slider-left'>
				<ul>
					<li><a href="#">Fish item</a></li>
					<li><a href="#">Vegetable item</a></li>
					<li><a href="#">Poultry item</a></li>
					<li><a href="#">Fruits Item</a></li>
					<li><a href="#">Rice Item</a></li>
				</ul>
			</div>
			<div class='nav-slider-right'>
				<!-- Slideshow container -->
				<div class="slideshow-container">

					<!-- Full-width images with number and caption text -->
					<div class="mySlides fade">

						<img src="images/Hilsa.jpg" style="width:100% ;height:240px">

					</div>

					<div class="mySlides fade">

						<img src="images/Bengali_Hilsa.jpg" style="width:100% ;height:240px">

					</div>

					<div class="mySlides fade">

						<img src="images/Hilsa.jpg" style="width:100% ;height:240px">

					</div>

					<!-- The dots/circles -->
					<div style="text-align:center">
						<span class="dot" onclick="currentSlide(1)"></span>
						<span class="dot" onclick="currentSlide(2)"></span>
						<span class="dot" onclick="currentSlide(3)"></span>
					</div>
				</div>
			</div>
			</br>
			<hr>
		</div>

		<div class='main'>


			<?php while ($popularProducts = mysqli_fetch_assoc($topProduct)) { ?>
				<div class="product-card">
					<div class="badge">Top</div>
					<div class="product-tumb">
						<img src="image/<?php echo $popularProducts['product_image']; ?>" alt="">
					</div>
					<div class="product-details">
						<span class="product-catagory"><?php echo $popularProducts['catagory_name']; ?></span>
						<h4><a href="view_product.php?id=<?php echo $popularProducts['product_id']; ?>"><?php echo $popularProducts['product_title']; ?></a></h4>
						<p><?php echo $popularProducts['product_dis']; ?></p>
						<div class="product-bottom-details">
							<div class="product-price"><?php echo $popularProducts['product_price']; ?> TK/Kg</div>
							<div class="product-links">
								<a href=""><i class="fas fa-heart"></i></a>
								<a href=""><i class="fas fa-shopping-cart"></i></a>
							</div>
						</div>
					</div>
				</div>
				
			<?php } ?>

			<!-- Product Brand-->
			<div class='middle-product'>
				<div class='Stores'>
					<h3>Fish Stores</h3>
				</div>

				<?php while ($popularfishItems = mysqli_fetch_assoc($fishItems)) { ?>
					<div class="product-card">
						<div class="badge">Top</div>
						<div class="product-tumb">
							<img src="image/<?php echo $popularfishItems['product_image']; ?>" alt="">
						</div>
						<div class="product-details">
							<span class="product-catagory"><?php echo $popularfishItems['catagory_name']; ?></span>
							<h4><a href="view_product.php?id=<?php echo $popularfishItems['product_id']; ?>"><?php echo $popularfishItems['product_title']; ?></a></h4>
							<p><?php echo $popularfishItems['product_dis']; ?></p>
							<div class="product-bottom-details">
								<div class="product-price"><?php echo $popularfishItems['product_price']; ?> TK/Kg</div>
								<div class="product-links">
									<a href=""><i class="fas fa-heart"></i></a>
									<a href=""><i class="fas fa-shopping-cart"></i></a>
								</div>
							</div>
						</div>
					</div>

				<?php } ?>


<!--<div class='Stores'>
					<h3>Vegetables Stores</h3>
				</div>
				-->

				<?php 
				while ($popularVegetablesItems = mysqli_fetch_assoc($allVegetablesItems)) { ?>
				print_r($popularVegetablesItems);
					<div class="product-card">
						<div class="badge">Top</div>
						<div class="product-tumb">
							<img src="image/<?php echo $popularVegetablesItems['product_image']; ?>" alt="">
						</div>
						<div class="product-details">
							<span class="product-catagory"><?php echo $popularVegetablesItems['catagory_name']; ?></span>
							<h4><a href="view_product.php?id=<?php echo $popularVegetablesItems['product_id']; ?>"><?php echo $popularVegetablesItems['product_title']; ?></a></h4>
							<p><?php echo $popularVegetablesItems['product_dis']; ?></p>
							<div class="product-bottom-details">
								<div class="product-price"><?php echo $popularVegetablesItems['product_price']; ?> TK/Kg</div>
								<div class="product-links">
									<a href=""><i class="fas fa-heart"></i></a>
									<a href=""><i class="fas fa-shopping-cart"></i></a>
								</div>
							</div>
						</div>
					</div>

				<?php } ?>


				<div class='Stores'>
					<h3>Poultry Stores</h3>
				</div>


				<?php while ($popularPoultryItems = mysqli_fetch_assoc($poultryItems)) { ?>
					<div class="product-card">
						<div class="badge">Top</div>
						<div class="product-tumb">
							<img src="image/<?php echo $popularPoultryItems['product_image']; ?>" alt="">
						</div>
						<div class="product-details">
							<span class="product-catagory"><?php echo $popularPoultryItems['catagory_name']; ?></span>
							<h4><a href="view_product.php?id=<?php echo $popularPoultryItems['product_id']; ?>"><?php echo $popularPoultryItems['product_title']; ?></a></h4>
							<p><?php echo $popularPoultryItems['product_dis']; ?></p>
							<div class="product-bottom-details">
								<div class="product-price"><?php echo $popularPoultryItems['product_price']; ?> TK/Kg</div>
								<div class="product-links">
									<a href=""><i class="fas fa-heart"></i></a>
									<a href=""><i class="fas fa-shopping-cart"></i></a>
								</div>
							</div>
						</div>
					</div>

				<?php } ?>
				<!--product item-->
			</div>
		</div>

	</div>
	<!-- Site footer -->
	<div>
		<footer class='bottom-footer '>
			<p>Author: LAB 3<br>
				<a href="#">lab3@gmail.com</a>
			</p>
		</footer>
	</div>

	<script src="https://kit.fontawesome.com/11ceed1b9f.js" crossorigin="anonymous"></script>
	<script>
		var slideIndex = 0;
		showSlides();

		function showSlides() {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			slideIndex++;
			if (slideIndex > slides.length) {
				slideIndex = 1
			}
			slides[slideIndex - 1].style.display = "block";
			setTimeout(showSlides, 6000); // Change image every 2 seconds
		}
	</script>
</body>

</html>