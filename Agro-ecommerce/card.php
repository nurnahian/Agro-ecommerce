<?php
session_start();
require_once 'class/font.php';

//print_r($_SESSION['cart']);

if (isset($_GET["action"])) {
    if ($_GET["action"] == "deleteCartItem") {
        foreach ($_SESSION["cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["cart"][$keys]);
            }
        }
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
    <link rel="stylesheet" href="css/product.css">

    <script src="script/jquery.min.js" type="txet/javascript"></script>
    <title>Shoping card</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="main ">
        <h2 style="text-align: center;">Shopping Cart</h2>
        <hr>
        
        <?php 
        if (count($_SESSION["cart"])>0) { ?>
        <div class="tb">
            <table id="customers">
                
                <tr>
                    <th>PRODUCT</th>
                    <th>QUANTITY</th>
                    <th>PRICE</th>
                    <th>Product Number</th>
                    <th></th>
                </tr>
                <?php foreach ($_SESSION["cart"] as $row) {
                            require_once 'class/font.php';
                            $productInfo = font::ProductDetailsInfo($row["item_id"]);
                            
                            $productDetails = mysqli_fetch_assoc($productInfo);
                            
                            ?>
                <tr>
                    <td>
                        <img src="images/<?php echo $productDetails['product_image'] ?>" alt="" style="width: 80px; height: 80px;float:left">
                        <h4><?php echo $row["item_name"]?></h4>
                    </td>
                    <td>
                        <div class="value-button">
                            <button class="btn btn-light" type="button" id="button-minus"> - </button>
                        </div>
                        <input type="number" id="itemQty" name="itemQty" class="form-control itemQty" value="1">
                        <div class="value-button">
                            <button class="btn btn-light" type="button" id="button-plus"> + </button>
                        </div>
                    </td>
                    <td>
                    <p><b>BDT :</b> <small class="itemPrice price" id="itemPrice"><?php echo $productDetails['product_price'] ?></small></p> 
                    </td>
                    <td><?php echo $productDetails['product_num'] ?></td>
                    <td>
                        <a href="?action=deleteCartItem&&id=<?php echo $row["item_id"] ?>" class="icon"> <i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </table>

        </div>
        
            <div>
                <a href="index.php"><button style="background-color: #4CAF50;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;float: left;">Continue</button></a>
                
                <a href=""><button style="background-color: #008CBA;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer; float: right;">Chack Out</button></a>
            </div>
            <div class="card">
                    <div style="text-align: left;">
                        <dl class="dlist-align">
                            <dt>Total price:</dt>
                            <dd class="text-right" id="totalPrice"></dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Total:</dt>
                            <dd class="text-right h6" id="grandTotal"></dd>
                        </dl>
                        <hr>
                        <p class="">
                        Payment with:
                            <img src="images/payment.jpg" height="120px">
                        </p>

                    </div> <!-- card-body.// -->
                </div>
                <?php }else { ?>
        <h1 class="text-primary">Nothing in the shopping Cart !</h1>
    <?php } ?>
    <div style="margin:auto;">
    <img src="images/download.png" alt="" height="400px" width="800px">
    </div>
    </div>
</body>

<script src="script/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        calculateSum();

        $('#customers tr').each(function() {
            $(this).find('#button-minus').on('click', function() {
                var parent_element = $(this).closest("tr");
                var qty = $(parent_element).find("#itemQty").val();
                if (qty > 1) {
                    qty--;
                    $(parent_element).find("#itemQty").val(qty);
                }
                var unitprice = $(parent_element).find('#unitPrice').text();

                $(parent_element).find('#itemPrice').text(qty * unitprice);
                calculateSum();
            })

            $(this).find('#button-plus').on('click', function() {
                var parent_element = $(this).closest("tr");
                var qty = $(parent_element).find("#itemQty").val();
                qty++;
                $(parent_element).find("#itemQty").val(qty);
                var unitprice = $(parent_element).find('#unitPrice').text();

                $(parent_element).find('#itemPrice').text(qty * unitprice);
                calculateSum();
            })
        })

        function calculateSum() {
            var total = 0;
            var discount = 0;
            var grandTotal = 0;
            $('.itemPrice').each(function() {
                var unitprice = parseFloat($(this).text());
                total += unitprice;
                $('#totalPrice').text('BDT ' + total);
            })
            grandTotal = total - discount;
            $('#discount').text('BDT ' + discount);
            $('#grandTotal').text('BDT ' + grandTotal);
        }
    });
</script>

</html>