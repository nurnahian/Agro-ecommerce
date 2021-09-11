<?php

class product{

    protected function saveProductImage() {
        $pictureName = $_FILES['product_image']['name'];
    // echo'<pre>';
     //print_r($pictureName);
     $directory = '../images/';
     $targetFile = $directory . $pictureName;
     $fileType = pathinfo($pictureName, PATHINFO_EXTENSION);
     $check = getimagesize($_FILES['product_image']['tmp_name']);
     if ($check) {
         if (!file_exists($targetFile)) {
             if ($fileType == 'jpg' || $fileType == 'png') {
                 if ($_FILES['product_image']['size'] < 4000000) {
                     move_uploaded_file($_FILES['product_image']['tmp_name'], $targetFile);
                     return $targetFile;
                 } else {
                     echo ('Your file size is too large. Thanks !!!');
                 }
             } else {
                 echo ('Please use jpg or png image file. Thanks !!!');
             }
         } else {
             echo ('File already exist. Thanks !!!');
         }
     } else {
         echo ('Please use an image file. Thanks !!!');
     }
    }

    public function saveProductInfo($data) {
        require_once 'db.php';
        $targetFile = product::saveProductImage();
        $produt = "INSERT INTO product(product_title, product_num,	product_price, catagory_id,public_status, product_dis,product_image )
      VALUES ('$data[product_title]', '$data[product_number]',  '$data[product_price]', '$data[product_catagory]', '$data[public_status]', '$data[product_dis]', '$targetFile')";
     $link = db::db_connect();
     if (mysqli_query($link, $produt)) {
        $message = "Product added info save successfully";
        return $message;
     } else {
         die('Query Problem' . mysqli_error($link));
     }
    }

    public function getAllProductInfo() {
        require_once 'db.php';
       // $sql = "SELECT p.*, c.catagory_name FROM product as p, pcatagory as c WHERE p.product_id = c.id ";
        $sql = "SELECT b.*, c.catagory_name FROM product as b, pcatagory as c WHERE b.catagory_id = c.id";
        $link = db ::db_connect();
        if (mysqli_query($link, $sql)) {
            $queryResult = mysqli_query($link, $sql);
            return $queryResult;
        } else {
            die('Query Problem' . mysqli_error($link));
        }
    }

    public function editSelectProduct($productId) {
        require_once 'db.php';
        $link = db ::db_connect();
        $productsql = "SELECT * FROM product WHERE product_id= '$productId' ";
        if (mysqli_query($link, $productsql)) {
            $queryResult = mysqli_query($link, $productsql);
            return $queryResult;
        } else {
            die('Query Problem' . mysqli_error($link));
        }
       
    }

    public function updateSelectProduct($productId) {
        require_once 'db.php';
        $link = db ::db_connect();
        $setsql = "UPDATE product SET product_title = '$data[product_title]', product_num = '$data[product_number]', product_price='$data[product_price]', catagory_id='$data[product_catagory]', public_status = '$data[public_status]',product_dis='$data[product_dis]', product_image='$targetFile' WHERE product_id = '$productId' ";

        if (mysqli_query($link, $setsql)) {
            $message = 'Category info saved successfully';
            header("Location: view_product.php");
            return $message;
            
        } else {
            die('Query Problem' . mysqli_error($link));
        }
       
    }

    public function getAllSubProductInfo() {
        require_once 'db.php';
       // $sql = "SELECT p.*, c.catagory_name FROM product as p, pcatagory as c WHERE p.product_id = c.id ";
        $allsubcatagory = "SELECT * FROM pcatagory ORDER BY id DESC";
        $link = db ::db_connect();
        if (mysqli_query($link, $allsubcatagory)) {
            $queryResult = mysqli_query($link, $allsubcatagory);
            return $queryResult;
        } else {
            die('Query Problem' . mysqli_error($link));
        }
    }
    

    public function selectPCatagory($categoryId) {
        require_once 'db.php';
        $link = db ::db_connect();
        $getsql = "SELECT * FROM pcatagory WHERE id = '$categoryId' ";
        if (mysqli_query($link, $getsql)) {
            $queryResult = mysqli_query($link, $getsql);
            return $queryResult;
        } else {
            die('Query Problem' . mysqli_error($link));
        }
       
    }
    public function updatePCatagory($data, $categoryId){
        require_once 'db.php';
        $link = db ::db_connect();
        $setsql = "UPDATE pcatagory SET catagory_name = '$data[product_catagory]', catagory_num = '$data[product_number]', publication_status = '$data[publication_status]' WHERE id = '$categoryId' ";
        
        if (mysqli_query($link, $setsql)) {
            $message = 'Category info saved successfully';
            header("Location: view_product_catagory.php");
            return $message;
            
        } else {
            die('Query Problem' . mysqli_error($link));
        }
    }

    public function deleteCatagory($id) {
        require_once 'db.php';
        $link = db ::db_connect();
        $deletesql = "DELETE FROM pcatagory WHERE id = '$id'";
               
        if (mysqli_query($link, $deletesql)) {
             $message = 'Category info Delete successfully';
             return $message;
        } else {
            die('Query Problem' . mysqli_error($link));
        }
    }

    public static function unpublishCategory($id){
        require_once 'db.php';
        $link = db ::db_connect();
        $sql = "UPDATE product SET public_status=0 WHERE product_id=$id";
        if (mysqli_query($link,$sql)){
            return 'Post Unpublished successfully!';
        } else {
            die('Unpublish Category query error : '.mysqli_error($link));
        }
    }
    
    public static function publishCategory($id){
        require_once 'db.php';
        $link = db ::db_connect();
        $sql = "UPDATE product SET public_status=1 WHERE product_id=$id";
        if (mysqli_query($link,$sql)){
            return 'Post Unpublished successfully!';
        } else {
            die('Publish Category query error : '.mysqli_error($link));
        }
    }

    public static function deleteCategoryInfo($id){
        require_once 'db.php';
        $link = db ::db_connect();

        $sql="SELECT * FROM product WHERE product_id='$id'";

	    $result=mysqli_query($link,$sql);
	    $row=mysqli_fetch_assoc($result);
        //echo print_r($row);
	    $delete_img=$row['product_image'];

        if(!empty($delete_img)){
           unlink("../images/".$delete_img);
       }
        $deletesql = "DELETE FROM product WHERE product_id=$id";
       if (mysqli_query($link,$deletesql)){
           header('location: view_product.php');
           return 'Category Info Deleted Successfully!';
        } else {
           die('Category delete query problem : '.mysqli_error($link));
       }
    }
    public function getAdminInfo() {
        require_once 'db.php';
        $allsubcatagory = "SELECT * FROM users WHERE user_role='admin' ORDER BY user_id  DESC";
        $link = db ::db_connect();
        if (mysqli_query($link, $allsubcatagory)) {
            $queryResult = mysqli_query($link, $allsubcatagory);
            return $queryResult;
        } else {
            die('Query Problem' . mysqli_error($link));
        }
    }
    public function getAllUserInfo() {
        require_once 'db.php';
        $allsubcatagory = "SELECT * FROM users WHERE user_role='user' ORDER BY user_id  DESC";
        $link = db ::db_connect();
        if (mysqli_query($link, $allsubcatagory)) {
            $queryResult = mysqli_query($link, $allsubcatagory);
            return $queryResult;
        } else {
            die('Query Problem' . mysqli_error($link));
        }
    }

    //

    public function deleteUser($id) {
        require_once 'db.php';
        $link = db ::db_connect();
        $deletesql = "DELETE FROM users WHERE userid = '$id'";
               
        if (mysqli_query($link, $deletesql)) {
            $message = 'User info Delete successfully';
            return $message;
        } else {
            die('Query Problem' . mysqli_error($link));
        }
    }

    public static function makeAdmin($id){
        require_once 'db.php';
        $link = db ::db_connect();
        $sql = "UPDATE users SET user_role='admin' WHERE product_id=$id";
        if (mysqli_query($link,$sql)){
            return 'Post Unpublished successfully!';
        } else {
            die('Unpublish Category query error : '.mysqli_error($link));
        }
    }
    
    public static function makeUser($id){
        require_once 'db.php';
        $link = db ::db_connect();
        $sql = "UPDATE users SET user_role='admin' WHERE product_id=$id";
        if (mysqli_query($link,$sql)){
            return 'Post Unpublished successfully!';
        } else {
            die('Publish Category query error : '.mysqli_error($link));
        }
    }

    public static function userLogout()
    {
        session_destroy();
        header('location: ../index.php');
        $message = "Logged out successfully.";
        return $message;
    }

}
?>
