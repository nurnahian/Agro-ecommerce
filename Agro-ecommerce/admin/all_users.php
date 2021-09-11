<?php
require_once 'product.php';

$queryAdminResult = product::getAdminInfo();
$queryUserResult = product::getAllUserInfo();
$deleteMessage = '';

if (isset($_GET['status'])) {
  if ($_GET['status'] == 'admin') {
    $message = product::makeUser($_GET['id']);
  }

  if ($_GET['status'] == 'user') {
    $message = product::makeAdmin($_GET['id']);
  }
  if ($_GET['status'] == 'delete') {
    $message = product::deleteUser($_GET['id']);
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

  <title>All Users</title>
</head>

<body>

  <div class="main">
    <?php include 'header.php'; ?>

    <div class="right">
      <h2 style="text-align: center;">View All Admin</h2>
      <hr>
      <h3><?php echo $deleteMessage; ?></h3>
      <table id="customers">
        <tr>
          <th>SL No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Access Role</th>
          <th>Edit/Delete</th>
        </tr>
        <?php
        $i = 1;
        while ($allAdmin = mysqli_fetch_assoc($queryAdminResult)) { ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $allAdmin['user_name']; ?></td>
            <td><?php echo $allAdmin['email']; ?></td>
            <td><?php echo $allAdmin['mobile']; ?></td>
            <td><?php echo $allAdmin['user_role']; ?></td>
            <td>
                <a href="?status=admin&&id=<?php echo  $allAdmin['user_id']; ?>"><i class="fas fa-arrow-up"></i></a>
                          
                <a href="?status=delete&&id=<?php echo $allAdmin['id']; ?>"><i class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
        <?php $i++;
        } ?>
      </table>

      <br>
      <h2 style="text-align: center;">View All User</h2>
      <hr>
      <h3><?php echo $deleteMessage; ?></h3>
      <table id="customers">
        <tr>
          <th>SL No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Access Role</th>
          <th>Action</th>
        </tr>
        <?php
        $i = 1;
        while ($allUsers = mysqli_fetch_assoc($queryUserResult)) { ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $allUsers['user_name']; ?></td>
            <td><?php echo $allUsers['email']; ?></td>
            <td><?php echo $allUsers['mobile']; ?></td>
            <td><?php echo $allUsers['user_role']; ?></td>
            <td>

                <a href="?status=user&&id=<?php echo $allUsers['user_id']; ?>"><i class="fas fa-arrow-down"></i></i></a>
             
              <a href="?status=delete&&id=<?php echo $allUsers['id']; ?>"><i class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
        <?php $i++;
        } ?>
      </table>
    </div>
  </div>

</body>

</html>