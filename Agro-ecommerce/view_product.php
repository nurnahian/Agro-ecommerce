<?php
session_start();
require_once 'class/font.php';

//if (isset($_GET['id'])){
  // $productId = $_GET['id'];
//} else {
  //  header('location: index.php');
//}

$productId = $_GET['id'];
$queryResult = font::viewProduct($productId);
$productInfo = mysqli_fetch_assoc($queryResult);


if(isset($_POST["add_to_cart"]))
{
	
    if(isset($_SESSION["cart"]))
    {
        $item_array_id = array_column($_SESSION["cart"], "item_id");
        if(!in_array($productId, $item_array_id))
        {
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'item_id'       =>  $productId,
                'item_name'     =>  $productInfo["product_title"],
                'item_price'    =>  $productInfo["product_price"],
                'item_quantity' =>  $_POST["itemQty"]
            );
            $_SESSION["cart"][$count] = $item_array;
        }
        else
        {
            echo '<script>alert("This Already Added on cart")</script>';
        }
    }
    else
    {
        $item_array = array(
            'item_id'       =>  $productId,
            'item_name'     =>  $productInfo["product_title"],
            'item_price'    =>  $productInfo["product_price"],
            'item_quantity' =>  $_POST["itemQty"]
        );
        $_SESSION["cart"][0] = $item_array;
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='stylesheet' href='css/style.css' type='text/css'>
	<link rel="stylesheet" href="css/all.min.css">

	<title>Product Detailes</title>
</head>

<body>

<?php include'header.php';?>
	<div class="pro-view">
		<h2 style="text-align: center;">Product Details</h2>
		<br>

		<div class="row">
			<div class="pro-left">
				<img src="images/<?php echo $productInfo['product_image']; ?>" style="width: 460px;height: 450px;" alt="Image">
			</div>

			<div class="pro-right">
				<div>
					<h3><?php echo $productInfo['product_title']; ?></h3>
				</div>
				<div>
					<p><?php echo $productInfo['product_dis']; ?></p>
				</div>
				<div>
					<label for="Product Price :">Product Price : <?php echo $productInfo['product_price']; ?></label>
				</div>

				<div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
				<input type="number" id="number" value="1" />
				<div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
				<div>
					<form  action="" method="post">
						<input type="hidden" id="itemQty" name="itemQty"  value="1">
						<div>
						<button type="submit" style="background-color: #008CBA;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;" name="add_to_cart"><i class="fas fa-shopping-bag"></i>|<span>Add to cart</span></button>
						</div>
					</form>
					<!--<input type="submit" name="submit" value="ADD Card"> -->
					
				</div>
			</div>
		</div>

	</div>
	<script>
		function increaseValue() {
			var value = parseInt(document.getElementById('number').value, 10);
			value = isNaN(value) ? 1 : value;
			value++;
			document.getElementById('number').value = value;
		}

		function decreaseValue() {
			var value = parseInt(document.getElementById('number').value, 10);
			value = isNaN(value) ? 1 : value;
			value < 2 ? value = 2 : '';
			value--;
			document.getElementById('number').value = value;
		}
	</script>
</body>

</html>