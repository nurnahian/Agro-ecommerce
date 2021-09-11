<?php
require_once 'product.php';

$queryResult = product::getAllSubProductInfo();
$deleteMessage='';
if (isset($_GET['status'])) {
    $id = $_GET['id'];
    $deleteMessage = product::deleteCatagory($id);
    //$_SESSION['deleteMessage'] = $deleteMessage;
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
  <title>View Product Catagory</title>
</head>

<body>

  <div class="main">
    <?php include 'header.php'; ?>

    <div class="right">
      
      <h2 style="text-align: center;">View All Product Catagory</h2>
                    <hr>
                    <h3><?php echo $deleteMessage; ?></h3>
      <table id="customers">
        <tr>
          <th>SL No</th>
          <th>Product Catagory Name</th>
          <th>Product Catagory Details</th>
          <th>Product Catagory Status</th>
          <th>Edit/Delete</th>
        </tr>
        <?php
        $i = 1;
        while ($subproduct = mysqli_fetch_assoc($queryResult)) { ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $subproduct['catagory_name']; ?></td>
            <td><?php echo $subproduct['catagory_num']; ?></td>
            <td><?php echo $subproduct['publication_status']== 1 ? 'Published' : 'Unpublished'; ?></td>
            <td>
            <a href="edit_product_category.php?id=<?php echo $subproduct['id'];?>"><i class="fas fa-edit"></i></a>
            <a href="?status=delete&&id=<?php echo $subproduct['id']; ?>"><i class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
        <?php $i++;} ?>
      </table>
    </div>
  </div>

</body>

</html>