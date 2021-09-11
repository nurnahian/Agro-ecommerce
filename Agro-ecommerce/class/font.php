<?php

class font
{

    public function allActiveProduct()
    {
        require_once 'db.php';
        $link = db ::db_connect();
        $sql = "SELECT b.*, c.catagory_name FROM product as b, pcatagory as c WHERE b.catagory_id = c.id && public_status=1";
        
        if (mysqli_query($link, $sql)) {
            $queryResult = mysqli_query($link, $sql);
            return $queryResult;
        } else {
            die('Query Problem' . mysqli_error($link));
        }
    }
    public function fishItem()
    {
        require_once 'db.php';
        $link = db ::db_connect();
        $sql = "SELECT b.*, c.catagory_name FROM product as b, pcatagory as c WHERE b.catagory_id = c.id && public_status=1 && c.catagory_name='FISH'";
        
        if (mysqli_query($link, $sql)) {
            $queryResult = mysqli_query($link, $sql);
            return $queryResult;
        } else {
            die('Query Problem' . mysqli_error($link));
        }
    }
    public function vagetItem()
    {
        require_once 'db.php';
        $link = db ::db_connect();

        $vsql = "SELECT b.*, c.catagory_name FROM product as b, pcatagory as c WHERE b.catagory_id = c.id && public_status=1 && c.catagory_name='VEGETABLES'";
        
        if (mysqli_query($link, $vsql)) {
            $queryResult = mysqli_query($link, $vsql);
            return $queryResult;
        } else {
            die('Query Problem' . mysqli_error($link));
        }
    }
    
    public function poultryItems()
    {
        require_once 'db.php';
        $link = db ::db_connect();
        $sql = "SELECT b.*, c.catagory_name FROM product as b, pcatagory as c WHERE b.catagory_id = c.id && public_status=1 && c.catagory_name='POULTRY'";
        
        if (mysqli_query($link, $sql)) {
            $queryResult = mysqli_query($link, $sql);
            return $queryResult;
        } else {
            die('Query Problem' . mysqli_error($link));
        }
    }
    public function viewProduct($productId) {
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
    public function ProductDetailsInfo($product_id){
        require_once 'db.php';
        $link = db ::db_connect();
        $sql ="SELECT * FROM product WHERE public_status=1 AND product_id='$product_id'";
        if (mysqli_query($link, $sql)){
            return mysqli_query($link, $sql);
        } else {
            die('ProductDetailsInfo Query error : '.mysqli_error($link));
        }
    }

    public function userRegistration(){
        require_once 'db.php';
        $link = db ::db_connect();

        if ($_POST['password'] != $_POST['confirmPassword']) {
            $message = "Password and Confirm Password Does not Match!!";
            return $message;
        } else {
            $sql = "SELECT * FROM users WHERE email='$_POST[email]'";
            if (mysqli_query($link, $sql)) {
                $queryResult = mysqli_query($link, $sql);
                if (mysqli_num_rows($queryResult)>0) {
                    $message = "User email address already used!";
                    return $message;
                } else {
                    $sql = "INSERT INTO users(user_name,email,mobile,pass)
                          VALUES ('$_POST[name]','$_POST[email]','$_POST[mobile]','$_POST[password]')";
                    if (mysqli_query($link, $sql)) {
                        $message = "User Registration success. Please Login.";
                        return $message;
                    } else {
                        die('User Registration Query Error : ' . mysqli_error($link));
                    }
                }
            } else {
                die('User Check Error : ' . mysqli_error($link));
            }
        }
    }

    public function loginCheck(){
        require_once 'db.php';
        $link = db ::db_connect();

        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM users WHERE email='$email'";
        if (mysqli_query($link, $sql)) {
            $queryResult = mysqli_query($link, $sql);
            if (mysqli_num_rows($queryResult) > 0) {
                $userInfo = mysqli_fetch_assoc($queryResult);
                if ($password == $userInfo['pass']) {
                    session_start();
                    $_SESSION['user_id'] = $userInfo['user_id '];
                    $_SESSION['email'] = $userInfo['email'];
                    $_SESSION['name'] = $userInfo['user_name'];
                    $_SESSION['user_role'] = $userInfo['user_role'];
                    if ($userInfo['user_role']=='admin'){
                        header('location: http://localhost/Agro-ecommerce/admin/index.php');
                    } elseif ($userInfo['user_role']=='user') {
                        header('location: ../index.php');
                    }
                }
                else {
                    $message = "Password is not correct!<br> Please reset your password.";
                }
            }
            else{
                $message = "You are not registered! <br> Please register";
            }
        }
        else {
            die('Login Query Problem : ' . mysqli_error($link));
        }
        return $message;
    }

    public static function userLogout()
    {
        session_destroy();
        header('location: index.php');
        $message = "Logged out successfully.";
        return $message;
    }


}
?>
