<style>
input {
    border: none;
    height: 34px !important;
    width: 400px;
}

textarea {
    border: none;
    height: 100px !important;
    width: 400px;
    resize: none
}

td {
    vertical-align: top;
    border-bottom: 1px solid #eee;
    padding: 8px
}

.required {
    color: red;
}
</style>
<?php
session_start();
$total_price = 0;
$q = '';
$p = array();
$uuid = "";
if(isset($_SESSION['uname']) && isset($_SESSION['paswd'])){
    include('connect.php');
    $num_cart_item = 0;

    if(isset($_SESSION['cart'])){
		$q = implode(",",array_keys($_SESSION['cart']));  
        $p = $_SESSION['cart'];  
        $num_cart_item = count($_SESSION['cart']);      
		include('header.php');
		
		$uname = $_SESSION['uname'];
            $passw = $_SESSION['paswd'];
            $email = "";
            $name = "";
            $address = "";
            $mobile = "";
            $sql = mysqli_query($conn,"select * from users where (email='$uname' OR mobile='$uname') AND password='$passw'");
            
            if(mysqli_num_rows($sql)){
                $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
				$uuid = $row['uid'];
                $email = $row['email'];
                $name = $row['name'];
                $address = $row['address'];
                $mobile = $row['mobile'];
            }

        if($q){
			$rr = mysqli_query($conn, "select * from products where pid in ($q)");	
			while($row = mysqli_fetch_array($rr, MYSQLI_ASSOC)){
				$tmp = $row["pid"]; 
				$offer_price = round(($row['discount']/100) * $row['price']);
                $selling_price =  $row['price'] - $offer_price;
                $total_price += $selling_price*$p[$tmp];
			}
		}			
        ?>
<div style="margin-left:30%;;margin-top:50px;margin-bottom:-50px">
    <form action="" method="post">
        <table>
            <tr>
                <td>Name<span class="required">*</span></td>
                <td><input type="text" name="name" value="<?=$name?>" required /> </td>
            </tr>
            <tr>
                <td> Mobile<span class="required">*</span></td>
                <td><input type="text" name="mobile" value="<?=$mobile?>" required /></td>
            </tr>
            <tr>
                <td> Email<span class="required">*</span></td>
                <td><input type="text" name="email" value="<?=$email?>" required /></td>
            </tr>
            <tr>
                <td>Delivery Address<span class="required">*</span></td>
                <td> <textarea name="address" required><?=$address?></textarea></td>
            </tr>
            <tr>
                <td>Total Price</td>
                <td><b>&#8377; <span id="tot_price"><?=$total_price?></span></b></td>
            </tr>
            <tr>
                <td colspan="2" align="right"><button type="submit" name="place_order"
                        style="background-color: #ff9f00;" class="placeorder">Place Order</button></a></td>
            </tr>
        </table>
    </form>
</div>
<?php
		// include('footer.php');
	} 
    else {
		header("Location:index.php");
	}
} 
else {
    header("Location:index.php");
}

if(isset($_POST['place_order'])){
	$name = $_POST["name"];
	$mobile = $_POST["mobile"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	$total_price = 0;
	$order_user = mysqli_query($conn, "insert into orders_users(`name`, `email`, `mobile`, `address`) values('$name','$email','$mobile','$address')");
	$last_insert_id =  mysqli_query($conn, "SELECT LAST_INSERT_ID()");
	$lid = mysqli_fetch_array($last_insert_id, MYSQLI_ASSOC);
	$o_u_id = $lid["LAST_INSERT_ID()"];
	$rr = mysqli_query($conn, "select * from products where pid in ($q)");	
	while($row = mysqli_fetch_array($rr, MYSQLI_ASSOC)){
		$tmp = $row["pid"]; 
		$price = $row['price'];
		$offer_price = round(($row['discount']/100) * $row['price']);
        $selling_price =  $price - $offer_price;
        $total_price += $selling_price*$p[$tmp];		
		mysqli_query($conn, "insert into orders(`order_id`,`uid`, `pid`, `numitem`, `price`) values($o_u_id,$uuid,'$tmp',$p[$tmp],'$price')");		
		mysqli_query($conn, "update products set quantity=(quantity - $p[$tmp]) where pid=$tmp");
	}
	$_SESSION["oid"] = $o_u_id;
	header("Location:orderPlaced.php");
}
?>