<?php


$db = mysqli_connect('localhost', 'root', '', 'agro_ecommerce');
$message = '';
if (isset($_POST['submit'])) {

    $sql = "INSERT INTO pcatagory (catagory_name, catagory_num,publication_status)
            VALUES ('$_POST[product_catagory]', '$_POST[product_number]','$_POST[publication_status]')";

    if (mysqli_query($db, $sql)) {

        header('location: add_catagory.php');
        $massage = "Add Catagory successfully";
        return $massage;
    } else {
        die('Error' . mysqli_error($db));
    }
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
            <h2 style="text-align: center;">ADD PRODUCT CATAGORY</h2>
                    <hr>
                <form action="" method="POST" enctype="multipart/form-data">
                    <h4 style="color:seagreen;"><?php echo $message; ?></h4>
                    <div class="row">
                        <div class="col-25">
                            <label for="Product Catagory">Product Catagory :</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="product_catagory" style="text-transform: uppercase;" name="product_catagory" placeholder="Product Catagory">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Product Number">Product Catagory Description :</label>
                        </div>
                        <div class="col-75">
                            <textarea id="product_number" name="product_number" placeholder="Write something about this PProduct Catagory" style="height:200px"></textarea>
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
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>

</body>

</html>