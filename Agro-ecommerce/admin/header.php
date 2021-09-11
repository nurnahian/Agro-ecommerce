<?php
session_start();

if (isset($_SESSION['user_role'])){
    if ($_SESSION['user_role']=='user'){
        header('location: ../index.php');
    }
}


if (isset($_GET['status'])){
    require_once 'product.php';
    if ($_GET['status'] == 'logout'){
        $message = product::userLogout();
    }
}

?>

<div class="left">
            <div class="admin-nav">
                
                <ul>
                    <li><a href="index.php"><?php echo $_SESSION['name']?></a></li>
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="add_product.php">Add Product</a></li>
                    <li><a href="view_product.php">View Product</a></li>
                    <li><a href="add_catagory.php">Add product-catagory</a></li>
                    <li><a href="view_product_catagory.php">View product-catagory</a></li>
                    <li><a href="all_users.php">All Users</a></li>
                    <li><a href="all_order.php">All Order</a></li>
                    <li><a href="../index.php">Go To Shopping</a></li>
                    <li><a href="?status=logout">Log Out</a></li>
                </ul>
            </div>
        </div>