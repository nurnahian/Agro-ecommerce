<?php
 require_once 'product.php';


$db = mysqli_connect('localhost','root','','agro_ecommerce');

$productId = $_GET['id'];
$queryResult =product::editSelectProduct($productId);
$productInfo = mysqli_fetch_assoc($queryResult);

$sql = "SELECT * FROM  pcatagory WHERE publication_status=1";

    if (mysqli_query($db,$sql)){
        $queryResult = mysqli_query($db,$sql);
    } else {
        die('Error'. mysqli_error($db));
    }

$message='';

if (isset($_POST['submit'])) {
    $message = product::updateSelectProduct($_POST);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Edit Product</title>
</head>
<body>

    <div class="main">
    <?php include 'header.php';?>
        

        <div class="right">
            <div class="container">
                <form action="" method="POST" enctype="multipart/form-data">
                                       
                    <h2 style="text-align: center;">Edit PRODUCT</h2>
                    <hr>
                    <h3 style="color: green;text-align: center;"><?php echo $message; ?></h3>
                    <div class="row">
                        <div class="col-25">
                            <label for="Product Title">Product Title :</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="product_title" value="<?php echo $productInfo['product_title']; ?>" name="product_title" placeholder="Product Title">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Product Number">Product Number :</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="product_number" value="<?php echo $productInfo['product_num']; ?>" name="product_number" placeholder="Product Number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Product Price">Product Price :</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="product_price" value="<?php echo $productInfo['product_price']; ?>" name="product_price" placeholder="Product Price">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="product-catagory">product-catagory :</label>
                        </div>
                        <div class="col-75">
                            <select id="product-catagory" name="product_catagory">
                                <option>---Select Category Name---</option>
                                <?php while ($publishedCategory= mysqli_fetch_assoc($queryResult)) { ?>
                                <option value="<?php echo $publishedCategory['id']; ?>"><?php echo $publishedCategory['catagory_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="product status">product Status :</label>
                        </div>
                        <div class="col-75">
                            <select name="public_status">
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Product Description">Product Description :</label>
                        </div>
                        <div class="col-75">
                            <textarea id="subject" name="product_dis" placeholder="Write something about this Product"
                                style="height:200px"><?php echo $productInfo['product_dis']; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Product Image">Product Image :</label>
                        </div>
                        <div class="col-75">
                            <img src="<?php echo $productInfo['product_image']; ?>" alt="Image" style="height:80px;width: 80px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Product Image">Product Image :</label>
                        </div>
                        <div class="col-75">
                            <input type="file" id="product_image" name="product_image" accept="image/*">
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" name="submit" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
   
</body>
</html>