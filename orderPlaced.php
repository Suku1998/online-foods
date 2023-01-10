<!doctype html>
<html>
<head>
   <title></title>
   <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>   
    <!-- Bootstrap CSS -->
    <link href="bootstrape/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        #invoice, #invoice * {
            visibility: visible;
        }
        #invoice {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>
<body style="margin:0; padding:0">
<?php
session_start();
include('connect.php');

if(isset($_SESSION['cart'])){
	unset($_SESSION['cart']);
}

?>

<div style="background-color: #060F20; padding: 8px 2%;">
   <table style="width:100%">
        <tr>
            <td style="text-align:left">
                <a style="padding:0;" href="home.php"><img src="image/logo123.png" style="height:50px" /></a>
            </td>
			
        </tr>
    </table>    
</div><br/>

<div class="container" id="invoice">
    <?php
    if(isset($_SESSION['oid'])){
        $oid = $_SESSION['oid'];
        $query =  "SELECT * FROM orders_users WHERE o_id='$oid'";
        $order_user = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($order_user)){
                $view = "
                <h4>Your Details</h4>
                <table class='table'>
                    <tr>
                        <td>Name</td>
                        <td>".$row['name']."</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>".$row['email']."</td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>".$row['mobile']."</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>".$row['address']."</td>
                    </tr>
                </table>
                ";
                echo $view;
        }
        $query =  "SELECT * FROM orders WHERE order_id='$oid'";
        $order_user = mysqli_query($conn,$query);
        $view = "
            <br/>
            <h4>Your Books</h4>
            <table class='table'>
        ";
        echo $view;
        $orderdate = "";
        $totalprice = 0;
        while($row = mysqli_fetch_array($order_user)){
                $pid = $row['pid'];
                $name = "";
                $query2 = "SELECT description FROM products WHERE pid='$pid'";
                $book_name = mysqli_query($conn,$query2);
                while($row2 = mysqli_fetch_array($book_name)){
                    $name = $row2['description'];
                }
                $view = "
                    <tr>
                        <td>Book Name</td>
                        <td>".$name."</td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td>".$row['numitem']."</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>".$row['price']."</td>
                    </tr>
                    <tr style='border:none;'>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                ";
                echo $view;
                $orderdate = $row["ordered_date"];
                $totalprice = $totalprice + $row['price'];
        }
        $view = "
            </table>
            Order Date : ".substr($orderdate,0,10)."
            <br/>
            <b>Total Price : ".$totalprice."</b>
            <br/>
            <b> Payment Method : Cash on Delivery </b>
        ";
        echo $view;
        unset($_SESSION['oid']);
    }
    ?>
</div>
<div style="text-align:center;" class="mt-2 mb-4">
    <button class="btn btn-primary" onclick="window.print()">Print Invoice</button>
</div>
<h1 style="text-align:center">Thank you for Shopping with us. <a href='home.php'>Continue shopping.</a></h1>
</body>
</html>