<?php
require_once 'product.php';

$queryResult = product::getAllProductInfo();
$message='';
if (isset($_GET['status'])) {
  if ($_GET['status'] == 'unpublish') {
    $message = product::unpublishCategory($_GET['id']);
  }

  if ($_GET['status'] == 'publish') {
    $message = product::publishCategory($_GET['id']);
  }
  if ($_GET['status'] == 'delete') {
    $message = product::deleteCategoryInfo($_GET['id']);
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
  <link rel="stylesheet" href="css/all.min.css">
  <title>View Product</title>
</head>

<body>

  <div class="main">
    <?php include 'header.php'; ?>

    <div class="right">

      <h2 style="text-align: center;">View All Product</h2>
      <hr>
      <h3><?php echo $message; ?></h3>
      <table id="customers">
        <tr>
          <th>SL No</th>
          <th>Product Title</th>
          <th>Product Number</th>
          <th>Product Price</th>
          <th>Product Catagory</th>
          <th>Product Status</th>
          <th>Product Description</th>
          <th>Product Image</th>
          <th></th>
        </tr>
        <?php
        $i = 1;
        while ($product = mysqli_fetch_assoc($queryResult)) { ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $product['product_title']; ?></td>
            <td><?php echo $product['product_num']; ?></td>
            <td><?php echo $product['product_price']; ?></td>
            <td><?php echo $product['catagory_name']; ?></td>
            <td><?php echo $product['public_status'] == 1 ? 'Published' : 'Unpublished'; ?></th>
            <td><?php echo $product['product_dis']; ?></td>
            <td><img src="<?php echo $product['product_image']; ?>" alt="Image" style="height:80px;width: 80px;"></td>
            <td>
              <?php if ($product['public_status'] == 1) { ?>

                <a href="?status=unpublish&&id=<?php echo $product['product_id']; ?>"><i class="fas fa-arrow-up"></i></a>
              <?php }else { ?>

                <a href="?status=publish&&id=<?php echo $product['product_id']; ?>"><i class="fas fa-arrow-down"></i></i></a>
              <?php } ?>

              <a href="edit_product.php?id=<?php echo $product['product_id'];?>"><i class="fas fa-edit"></i></a>

              <a href="?status=delete&&id=<?php echo $product['product_id']; ?>" style="color: red;"><i class="fas fa-trash-alt"></i></a>
            </td>
          <tr>
          <?php $i++;
        } ?>
      </table>
    </div>
  </div>

</body>

</html>