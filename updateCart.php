<?php
session_start();
include('connect.php');
$id = $_GET['id'];
$action = $_GET['action'];
if($action == 'remove'){
    if(isset($_SESSION['cart'])){ 
        $p = $_SESSION['cart'];  
        unset($p[$id]);
        $_SESSION['cart'] = $p;
        echo "1";
    }
} else if($action == 'update'){
    $p = array();
    $output = array();
    $itmPrice = 0;
    $totPrice = 0;
    if(isset($_SESSION['cart'])){
        $q = implode(",",array_keys($_SESSION['cart']));  
        $p = $_SESSION['cart']; 
        $pnum = $_GET['pnum'];
        $p[$id] = $pnum; 
        $_SESSION['cart'] = $p;
        $rr = mysqli_query($conn, "select * from products where pid in ($q)");
        while($row = mysqli_fetch_array($rr, MYSQLI_ASSOC)){
            $tmp = $row["pid"];
            $offer_price = round(($row['discount']/100) * $row['price']);
            $selling_price =  $row['price'] - $offer_price;
            $totPrice += $selling_price*$p[$tmp];
            if($id == $tmp) {
                $itmPrice = $selling_price*$p[$tmp];
            }
        }
    }
    $output['itmprice'] = $itmPrice;
    $output['total_price'] = $totPrice;
    echo json_encode($output);
}