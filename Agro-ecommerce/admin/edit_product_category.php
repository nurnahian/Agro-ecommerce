<?php

require_once 'product.php';
$pcategoryId = $_GET['id'];
$queryResult =product::selectPCatagory($pcategoryId);
$pcategoryInfo = mysqli_fetch_assoc($queryResult);

if (isset($_POST['submit'])) {
    $update = product::updatePCatagory($_POST, $pcategoryId);
    //$_SESSION['updateMessage'] = $update;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Add product-catagory</title>
</head>

<body>

    <div class="main">
    <?php include 'header.php';?>

        <div class="right">
            <div class="container">
            <h2 style="text-align: center;">Edit PRODUCT CATAGORY</h2>
                    <hr>
                <form action="" method="POST" enctype="multipart/form-data">
                    <h4 style="color:seagreen;"><?php  ?></h4>
                    <div class="row">
                        <div class="col-25">
                            <label for="Product Catagory">Product Catagory :</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="product_catagory" name="product_catagory" value="<?php echo $pcategoryInfo['catagory_name']; ?>" placeholder="Product Catagory">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Product Number">Product Catagory Number :</label>
                        </div>
                        <div class="col-75">
                            <textarea id="product_number" name="product_number" placeholder="Write something about this PProduct Catagory" style="height:200px"><?php echo $pcategoryInfo['catagory_num']; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="product-catagory">product catagory Status :</label>
                        </div>
                        <div class="col-75">
                            <select name="publication_status">
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" name="submit" value="Update">
                    </div>
                </form>
            </div>
        </div>

</body>

</html>